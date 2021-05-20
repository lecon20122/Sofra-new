<template>
    <div>
        <div class="px-4 px-lg-0 py-3">
            <div class="pb-5">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5"
                        >
                            <!-- Shopping cart table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th
                                                scope="col"
                                                class="border-0 bg-light"
                                            >
                                                <div
                                                    class="p-2 px-3 text-uppercase"
                                                >
                                                    Product
                                                </div>
                                            </th>
                                            <th
                                                scope="col"
                                                class="border-0 bg-light"
                                            >
                                                <div
                                                    class="py-2 text-uppercase"
                                                >
                                                    Price
                                                </div>
                                            </th>
                                            <th
                                                scope="col"
                                                class="border-0 bg-light"
                                            >
                                                <div
                                                    class="py-2 text-uppercase"
                                                >
                                                    Quantity
                                                </div>
                                            </th>
                                            <th
                                                scope="col"
                                                class="border-0 bg-light"
                                            >
                                                <div
                                                    class="py-2 text-uppercase"
                                                >
                                                    Remove
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        v-for="(item, index) in items"
                                        :key="item.id"
                                    >
                                        <tr>
                                            <th scope="row">
                                                <div class="p-2">
                                                    <img
                                                        :src="
                                                            item.product.image
                                                        "
                                                        alt=""
                                                        width="70"
                                                        class="img-fluid rounded shadow-sm"
                                                    />
                                                    <div
                                                        class="ml-3 d-inline-block align-middle"
                                                    >
                                                        <h5 class="mb-0">
                                                            <a
                                                                href="#"
                                                                class="text-dark d-inline-block"
                                                                >{{
                                                                    item.product
                                                                        .name
                                                                }}</a
                                                            >
                                                        </h5>
                                                    </div>
                                                </div>
                                            </th>

                                            <td class="align-middle">
                                                <strong
                                                    >EGP
                                                    {{
                                                        item.product.price
                                                    }}</strong
                                                >
                                            </td>
                                            <td class="align-middle">
                                                <input
                                                    type="number"
                                                    class="form-control w-25"
                                                    min="1"
                                                    v-model="qty[index]"
                                                />
                                            </td>
                                            <td class="align-middle">
                                                <VueLoadingButton
                                                    :styled="false"
                                                    type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    :loading="isLoading"
                                                    @click.native="
                                                        submit(item.id, index)
                                                    "
                                                >
                                                    <span v-show="!done[index]"
                                                        ><i
                                                            class="fa fa-trash"
                                                        ></i
                                                    ></span>
                                                    <span v-show="done[index]"
                                                        >Deleted
                                                        <i
                                                            class="fa fa-check"
                                                        ></i
                                                    ></span>
                                                </VueLoadingButton>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End -->
                        </div>
                    </div>
                    <div class="row py-5 p-4 bg-white rounded shadow-sm">
                        <div class="col-lg-12">
                            <div
                                class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold"
                            >
                                Order summary
                            </div>
                            <div class="p-4">
                                <p class="font-italic mb-4">
                                    Shipping and additional costs are calculated
                                    based on values you have entered.
                                </p>
                                <ul class="list-unstyled mb-4">
                                    <li
                                        class="d-flex justify-content-between py-3 border-bottom"
                                    >
                                        <strong class="text-muted"
                                            >Order Subtotal </strong
                                        ><strong>EGP {{ subTotal }} </strong>
                                    </li>
                                    <li
                                        class="d-flex justify-content-between py-3 border-bottom"
                                    >
                                        <strong class="text-muted"
                                            >Shipping and handling</strong
                                        ><strong>EGP 20 </strong>
                                    </li>
                                    <li
                                        class="d-flex justify-content-between py-3 border-bottom"
                                    >
                                        <strong class="text-muted">Tax</strong
                                        ><strong>None</strong>
                                    </li>
                                    <li
                                        class="d-flex justify-content-between py-3 border-bottom"
                                    >
                                        <strong class="text-muted"
                                            >Total</strong
                                        >
                                        <h5 class="font-weight-bold">
                                            EGP {{ total }}
                                        </h5>
                                    </li>
                                </ul>
                                <a
                                    href="#"
                                    class="btn btn-success rounded-pill py-2 btn-lg btn-block"
                                    >Submit</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
import VueLoadingButton from "vue-loading-button";

export default {
    data() {
        return {
            isLoading: false,
            done: [],
            qty: []
        };
    },
    components: {
        VueLoadingButton
    },
    computed: {
        ...mapGetters({
            items: "cart/getItems"
        }),
        subTotal() {
            let total = 0;
            if (this.items) {
                Object.values(this.items).forEach((item, index) => {
                    if (this.qty[index]) {
                        total += item.product.price * this.qty[index];
                    } else {
                        total += item.product.price;
                    }
                });

                return total;
            }
        },
        total() {
            return this.subTotal + 20;
        }
    },
    methods: {
        ...mapActions({
            cart: "cart/deleteCartItems"
        }),
        submit(id, index) {
            this.isLoading = true;
            setTimeout(() => {
                this.cart({
                    payload: {
                        id: id
                    }
                }).then(() => {
                    this.isLoading = false;
                    this.done[index] = true;
                });
            },700);
        }
    },
    mounted() {
        this.$store.dispatch("cart/getCartItems");
    }
};
</script>
