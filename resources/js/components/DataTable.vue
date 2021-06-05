<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{ response.tableName }}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <th
                                v-for="column in response.displayedColumns"
                                :key="column.id"
                            >
                                {{ column }}
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
                                    {{ columnValue }}
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
export default {
    props: ["endpoint"],
    data() {
        return {
            response: {
                tableName: "",
                displayedColumns: [],
                records: []
            }
        };
    },
    computed: {
        filteredRecords(){
            return this.response.records
        }
    },
    methods: {
        getRecords() {
            return axios.get(`${this.endpoint}`).then(response => {
                this.response = response.data.data;
            });
        }
    },
    mounted() {
        this.getRecords();
    }
};
</script>
