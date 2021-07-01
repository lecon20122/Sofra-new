<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{ response.tableName }}
            </div>
            <div class="card-body">
                <!-- quickSearchQuery -->
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="filter">Quick Search results</label>
                        <input
                            type="text"
                            name=""
                            id="filter"
                            class="form-control"
                            v-model="quickSearchQuery"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="limit">Display Records</label>
                        <select
                            name=""
                            id="limit"
                            class="form-control"
                            v-model="limit"
                            @change="getRecords"
                        >
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="">All</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead">
                            <th
                                v-for="(column,index) in response.displayedColumns"
                                :key="column.id"
                            >
                                <span
                                    class="sortable"
                                    @click="sortBy(column)"
                                    >{{ index + column }}</span
                                >
                                <div
                                    class="arrow"
                                    v-if="sort.key === column"
                                    :class="{
                                        'arrow--asc': sort.order === 'asc',
                                        'arrow--desc': sort.order === 'desc'
                                    }"
                                ></div>
                            </th>
                        </thead>
                        <tbody>
                            <tr
                                v-for="record in filteredRecords"
                                :key="record.id"
                            >
                                <td
                                    v-for="(columnValue, column) in record"
                                    :key="column.id"
                                >
                                    <template
                                        v-if="
                                            editing.id === record.id &&
                                                isUpdatable(column)
                                        "
                                    >
                                        <div class="form-group">
                                            <input type="text"  class="form-control" v-model="editing.form[column]">
                                        </div>
                                    </template>
                                    <template v-else>
                                        {{ columnValue }}
                                    </template>
                                </td>
                                <td>
                                    <a
                                        href="#"
                                        class="text-primary text-decoration-none"
                                        @click.prevent="editEditableForm(record)"
                                        v-if="editing.id != record.id"
                                        >Edit</a
                                    >

                                    <template v-if="editing.id === record.id">
                                        <a
                                            href="#"
                                            class="text-primary text-decoration-none"
                                            @click.prevent="update"
                                            >Save</a><br>
                                        <a
                                            href="#"
                                            class="text-danger text-decoration-none"
                                            @click.prevent="editing.id = null"
                                            >Cancel</a>
                                    </template>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import queryString from "query-string";
export default {
    props: ["endpoint"],
    data() {
        return {
            response: {
                tableName: "",
                displayedColumns: [],
                records: []
            },
            sort: {
                key: "id",
                order: "asc"
            },
            quickSearchQuery: "",
            limit: 50,
            editing: {
                id: null,
                form: {},
                errors: []
            }
        };
    },
    computed: {
        filteredRecords() {
            let data = this.response.records;

            //SearchQuery
            data = data.filter(row => {
                return Object.keys(row).some(key => {
                    return (
                        String(row[key])
                            .toLowerCase()
                            .indexOf(this.quickSearchQuery.toLowerCase()) > -1
                    );
                });
            });
            //SearchQuery

            if (this.sort.key) {
                data = _.orderBy(
                    data,
                    i => {
                        let value = i[this.sort.key];

                        if (!isNaN(parseFloat(value))) {
                            return parseFloat(value);
                        }

                        return String(i[this.sort.key]).toLowerCase();
                    },
                    this.sort.order
                );
            }
            return data;
        }
    },
    methods: {
        getRecords() {
            return axios
                .get(`${this.endpoint}?${this.getQueryParameters()}`)
                .then(response => {
                    this.response = response.data.data;
                });
        },
        sortBy(column) {
            this.sort.key = column;
            this.sort.order = this.sort.order === "asc" ? "desc" : "asc";
        },
        getQueryParameters() {
            return queryString.stringify({
                limit: this.limit
            });
        },
        editEditableForm(record) {
            this.editing.errors = [];
            this.editing.id = record.id;
            this.editing.form = _.pick(record, this.response.updatable);
        },
        isUpdatable(column) {
            return this.response.updatable.includes(column);
        },
        update()
        {
            axios.patch(`${this.endpoint}/${this.editing.id}` , this.editing.form).then(()=>{
                this.getRecords().then(()=>{
                    this.editing.id = null
                    this.editing.form = {}
                })
            })
        }
    },
    mounted() {
        this.getRecords();
    }
};
</script>
<style lang="scss">
.sortable {
    cursor: pointer;
}
.arrow {
    display: inline-block;
    vertical-align: middle;
    width: 0;
    height: 0;
    margin-left: 3px;
    opacity: 0.6;

    &--asc {
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-bottom: 4px solid #222;
    }

    &--desc {
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid #222;
    }
}
</style>
