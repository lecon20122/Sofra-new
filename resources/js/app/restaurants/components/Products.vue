<template>
    <div>
        <div class="container-fluid mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <div
                        v-for="(product, index) in products"
                        :key="product.id"
                        class="row p-2 bg-white border rounded"
                    >
                        <div class="col-md-3 mt-1">
                            <img
                                class="img-fluid img-responsive rounded product-image"
                                :src="product.image"
                                style="width: 100%; height:100%;"
                            />
                        </div>
                        <div class="col-md-6 mt-1">
                            <h5>{{ product.name }}</h5>
                            <div class="d-flex flex-row">
                                <div class="ratings mr-2">
                                    <i class="fa fa-star"></i
                                    ><i class="fa fa-star"></i
                                    ><i class="fa fa-star"></i
                                    ><i class="fa fa-star"></i>
                                </div>
                                <span>310</span>
                            </div>
                            <p class="text-justify para mb-0">
                                {{ product.short_description }}
                                <br />
                            </p>
                        </div>
                        <div
                            class="align-items-center  align-content-center col-md-3 border-left border-right mt-1"
                        >
                            <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1 pt-3">
                                    EGP {{ product.price }}
                                </h4>
                            </div>
                            <h6 class="text-success">
                                <i class="fa fa-clock"></i> Ready in
                                {{ product.ready_in }} Minutes
                            </h6>
                            <div class="d-flex flex-column mt-5 pt-5">
                                <VueLoadingButton
                                    :styled="false"
                                    type="submit"
                                    class="btn btn-success"
                                    :loading="isLoading"
                                    @click.native="submit(product.id, index)"
                                    ><span v-show="!done[index]"
                                        ><i class="fa fa-cart-plus"></i></span
                                    ><span v-show="done[index]"
                                        >Added <i class="fa fa-check"></i></span
                                ></VueLoadingButton>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import VueLoadingButton from "vue-loading-button";

export default {
    components: {
        VueLoadingButton
    },
    props: ["products"],
    data() {
        return {
            productID: null,
            isLoading: false,
            done: []
        };
    },
    methods: {
        ...mapActions({
            cart: "restaurants/addItemToCart"
        }),
        submit(id, index) {
            this.isLoading = true;
            if (this.user.authenticated) {
                setTimeout(() => {
                    this.cart({
                        payload: {
                            productID: id
                        }
                    }).then(() => {
                        this.isLoading = false;
                        this.done[index] = true;
                    });
                }, 700);
            } else {
                this.$router.replace({ name: "Login" });
            }
        }
    },
    computed: {
        ...mapGetters({
            user: "auth/user"
        })
    }
};
</script>
