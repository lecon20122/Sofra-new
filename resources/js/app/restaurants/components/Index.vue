<template>
    <div class="container-sm py-5 justify-content-center">
        <div class="row ">
            <div
                v-for="item in restaurant.data"
                :key="item.id"
                class="col-lg-3 p-3"
            >
                <div class="card" style="width: 18rem;">
                    <img v-bind:src="item.image" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <a href="#"  @click="toRestaurant(item.id , item.slug)"><h5 class="card-title">{{ item.name }}</h5></a>
                        <p class="card-text">
                        <i class="fa fa-map-marker-alt text-danger pr-2"></i>{{ item.address }}
                        </p>
                        <p class="card-text">
                            <small class="text-muted"> <i class="fa fa-phone text-success pr-2"></i> {{ item.phone }}</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <pagination
            :meta="restaurant.meta"
            v-on:pagination="paginate"
        ></pagination>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
    computed: {
        ...mapGetters({
            restaurant: "restaurants/restaurant"
        })
    },
    mounted() {
        this.$store.dispatch("restaurants/restaurants");
    },
    methods: {
        ...mapActions({
            restaurants: "restaurants/restaurants",
            restaurantByID: "restaurants/restaurant",
            restaurantsPaginate: "restaurants/restaurantsPaginate"
        }),
        paginate(page) {
            this.restaurantsPaginate({
                payload: {
                    page: page
                }
            });
        },
        toRestaurant(id , slug) {
            this.restaurantByID({
                payload: {
                    id: id
                }
            }).then(()=>{
                this.$router.push({  name: "Restaurant" , params : {id : id , slug:slug} });
            })
        }
    }
};
</script>
