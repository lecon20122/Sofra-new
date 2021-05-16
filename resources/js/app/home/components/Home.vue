<template>
    <div>
        <section class="half-page">
            <div class="container">
                <div class="content-wrapper">
                    <div class="row ">
                        <div
                            class="col-xs-12 col-sm-12 col-md-6 col-lg-6 hero-box"
                        >
                            <h1 class="text-center d-none d-lg-block">
                                اطلب و كل أكل بيتي اللي نفسك فيه
                            </h1>
                            <form class="navbar-form">
                                <div class="input-group">
                                    <input
                                        class="form-control "
                                        type="search"
                                        placeholder="Order now from different Restaurants"
                                        v-model="keyword"
                                        @focusin="focus(true)"
                                        @focusout="focus(false)"
                                    />

                                    <!-- <span class="input-group-btn px-3">
                                        <button
                                            type="submit"
                                            class="btn btn-default py-2 px-4"
                                        >
                                            <span class="fa fa-search"></span>
                                        </button> </span
                                    > -->
                                    <!-- search -->
                                </div>
                                <ul
                                    class="list-group"
                                    style="padding-right: 0.1.8rem"
                                >
                                    <li
                                        v-show="hasfocus"
                                        v-for="result in search"
                                        :key="result.id"
                                        class="bg-white py-2 list-group-item "
                                        style="height: auto; width: auto; z-index: 10050;"
                                    >
                                        <i
                                            class="fa fa-utensils pr-2 text-danger"
                                        ></i>
                                        <span class="pr-2"
                                            ><a
                                                href="#"
                                                @click="toRestaurant(result.id , result.slug)"
                                                ><strong>
                                                    {{ result.name }}</strong
                                                ></a
                                            ></span
                                        >
                                        <!-- <small class="text-muted">
                                            <i
                                                class="fa fa-map-marker-alt text-danger pr-2"
                                            ></i>
                                            <span class="pr-2">{{
                                                result.address
                                            }}</span></small> -->
                                        <!-- <small class="text-muted">
                                            <i
                                                class="fa fa-phone text-success pr-2"
                                            ></i>
                                            <span class="pr-2">{{
                                                result.phone
                                            }}</span></small
                                        > -->
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4 bg-white container-fluid">
            <div class="text-center d-lg-none d-block">
                <h1 class="display-4 my-3">
                    Order Online Now
                </h1>
                <h5>
                    Enjoy a great experience from your house
                </h5>
            </div>
            <div class="how-to-order d-none d-lg-block"></div>
        </section>
    </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";

export default {
    data() {
        return {
            keyword: "",
            hasfocus: false
        };
    },
    computed: {
        ...mapGetters({
            search: "home/search"
        })
    },
    watch: {
        keyword(after, before) {
            this.$store.dispatch("home/search", {
                payload: {
                    keyword: this.keyword
                }
            });
        }
    },
    methods: {
        ...mapActions({
            restaurant: "restaurants/restaurant"
        }),

        focus(value) {
            setTimeout(()=> {
            this.hasfocus = value;
            },1000)
        },
        toRestaurant(id , slug) {
            this.restaurant({
                payload: {
                    id: id
                }
            }).then(()=>{
                this.$router.push({  name: "Restaurant" , params : {id : id , slug : slug} });
            })
        }
    }
};
</script>
