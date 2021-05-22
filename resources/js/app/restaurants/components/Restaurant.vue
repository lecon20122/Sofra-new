<template>
    <div>
        <!-- <div class="container-lg"> -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Profile widget -->
                <div class="bg-white shadow rounded overflow-hidden">
                    <div class="px-4 pt-0 pb-4 cover">
                        <div class="media align-items-end profile-head">
                            <div class="profile mr-3">
                                <img
                                    v-bind:src="restaurant.data.image"
                                    alt="..."
                                    width="150"
                                    class="rounded mb-2 img-thumbnail"
                                />
                            </div>
                            <div class="media-body mb-5 text-white">
                                <h2 class="mt-0 mb-0">
                                    {{ restaurant.data.name }}
                                </h2>
                                <p class="large mb-4">
                                    <i class="fas fa-map-marker-alt mr-2 text-danger"></i
                                    >{{ restaurant.data.address }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-light p-4 d-flex justify-content-end text-center"
                    >
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item text-success">
                                <h5 class="font-weight-bold mb-0 d-block">
                                   EGP {{ restaurant.data.delivery_fees }}
                                </h5>
                                <small class="text-success">
                                    <i class="fas fa-truck mr-1"></i>Delivery
                                    fees</small
                                >
                            </li>
                            <li class="list-inline-item text-danger">
                                <h5 class="font-weight-bold mb-0 d-block">
                                   EGP {{ restaurant.data.min_order }}
                                </h5>
                                <small class="text-danger">
                                    <i class="fas fa-user mr-2"></i>Minimum
                                    order</small
                                >
                            </li>
                        </ul>
                    </div>
                    <!-- infos -->
                    <!-- <div class="py-4 px-4">
                        <div
                            class="d-flex align-items-center justify-content-between mb-3"
                        >
                        </div>
                    </div> -->
                    <div class="container-fluid py-3">
                        <div class="container-fluid">
                        <ul
                            class="nav nav-pills mb-3"
                            id="pills-tab"
                            role="tablist"
                        >
                            <li class="nav-item" role="presentation">
                                <a
                                    class="nav-link active link"
                                    id="pills-menu-tab"
                                    data-toggle="pill"
                                    href="#pills-menu"
                                    role="tab"
                                    aria-controls="pills-menu"
                                    aria-selected="true"
                                    >Menu</a
                                >
                            </li>
                            <li class="nav-item" role="presentation">
                                <a
                                    class="nav-link link"
                                    id="pills-profile-tab"
                                    data-toggle="pill"
                                    href="#pills-profile"
                                    role="tab"
                                    aria-controls="pills-profile"
                                    aria-selected="false"
                                    >Profile</a
                                >
                            </li>
                            <li class="nav-item" role="presentation">
                                <a
                                    class="nav-link link"
                                    id="pills-contact-tab"
                                    data-toggle="pill"
                                    href="#pills-contact"
                                    role="tab"
                                    aria-controls="pills-contact"
                                    aria-selected="false"
                                    >Contact</a
                                >
                            </li>
                        </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div
                                class="tab-pane fade show active"
                                id="pills-menu"
                                role="tabpanel"
                                aria-labelledby="pills-menu-tab"
                            >
                                <product-cards
                                    :products="restaurant.data.products"
                                    :restaurant_id="restaurant.data.id"
                                ></product-cards>
                            </div>
                            <div
                                class="tab-pane fade"
                                id="pills-profile"
                                role="tabpanel"
                                aria-labelledby="pills-profile-tab"
                            ></div>
                            <div
                                class="tab-pane fade"
                                id="pills-contact"
                                role="tabpanel"
                                aria-labelledby="pills-contact-tab"
                            ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</template>

<script>
import product from "./Products.vue";
import { mapActions, mapGetters } from "vuex";
export default {
    components: {
        "product-cards": product
    },
    props: ["id"],
    computed: {
        ...mapGetters({
            restaurant: "restaurants/restaurantByID"
        })
    },
    mounted() {
        this.$store.dispatch("restaurants/restaurant", {
            payload: {
                id: this.id
            }
        });
    },


};
</script>
