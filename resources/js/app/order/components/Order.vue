<template>
    <div>
        <div class="container py-5">
            <div
                v-for="(order, index) in orders"
                :key="order.id"
                class="accordion py-2"
                id="accordionExample"
            >
                <div class="card">
                    <div class="card-header" :id="'heading-' + index">
                        <h2 class="mb-0">
                            <button
                                class="btn btn-link btn-block text-left text-dark text-decoration-none"
                                type="button"
                                data-toggle="collapse"
                                :data-target="'#collapse-' + index"
                                aria-expanded="true"
                                :aria-controls="'collapse-' + index"
                            >
                                <strong
                                    >Order # {{ order.id }} | Total :
                                    <span class="text-success mr-3">
                                        EGP {{ order.total }}</span
                                    >more details...</strong
                                >
                                <h6
                                    v-if="order.state === 'pending'"
                                    class="float-right text-primary text-uppercase"
                                >
                                    <i class="fa fa-clock "></i> Pending
                                </h6>
                                <h6
                                    v-if="order.state === 'accepted'"
                                    class="float-right text-success text-uppercase"
                                >
                                    <i class="fa fa-check text-success"></i>
                                    Accepted
                                </h6>
                                <h6
                                    v-if="order.state === 'rejected'"
                                    class="float-right text-danger text-uppercase"
                                >
                                    <i class="fa fa-times"></i> Rejected
                                </h6>
                                <h6
                                    v-if="order.state === 'delivered'"
                                    class="float-right text-success text-uppercase"
                                >
                                    <i class="fa fa-check-circle "></i>
                                    Delivered
                                </h6>
                            </button>
                        </h2>
                    </div>

                    <div
                        :id="'collapse-' + index"
                        class="collapse"
                        :aria-labelledby="'heading-' + index"
                        data-parent="#accordionExample"
                    >
                        <div class="card-body">
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
                                                                        Notes
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr
                                                                v-for="(product,
                                                                index) in orders[
                                                                    index
                                                                ]['products']"
                                                                :key="index"
                                                            >
                                                                <th scope="row">
                                                                    <div
                                                                        class="p-2"
                                                                    >
                                                                        <img
                                                                            alt=""
                                                                            width="70"
                                                                            class="img-fluid rounded shadow-sm"
                                                                            :src="
                                                                                product.image
                                                                            "
                                                                        />
                                                                        <div
                                                                            class="ml-3 d-inline-block align-middle"
                                                                        >
                                                                            <h5
                                                                                class="mb-0"
                                                                            >
                                                                                <p
                                                                                    href="#"
                                                                                    class="text-dark d-inline-block"
                                                                                >
                                                                                    {{
                                                                                        product.name.substring(
                                                                                            0,
                                                                                            30
                                                                                        ) +
                                                                                            ".."
                                                                                    }}
                                                                                </p>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </th>

                                                                <td
                                                                    class="align-middle"
                                                                >
                                                                    <strong
                                                                        >EGP
                                                                        {{
                                                                            product.price
                                                                        }}</strong
                                                                    >
                                                                </td>
                                                                <td
                                                                    class="align-middle"
                                                                >
                                                                    <p
                                                                        id="exampleFormControlTextarea1"
                                                                    >
                                                                        {{
                                                                            product
                                                                                .pivot
                                                                                .qty
                                                                        }}
                                                                    </p>
                                                                </td>
                                                                <td
                                                                    class="align-middle"
                                                                >
                                                                    <p
                                                                        id="exampleFormControlTextarea1"
                                                                    >
                                                                        {{
                                                                            product
                                                                                .pivot
                                                                                .notes
                                                                        }}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div
                                                        class="col-lg-12 bg-white rounded"
                                                    >
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-6"
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="exampleFormControlTextarea1"
                                                                        ><strong
                                                                            >Address</strong
                                                                        ></label
                                                                    >
                                                                    <p
                                                                        id="exampleFormControlTextarea1"
                                                                    >
                                                                        {{
                                                                            order.address ===
                                                                            "null"
                                                                                ? "please call the restaurant to add your address"
                                                                                : order.address
                                                                        }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-lg-6"
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="exampleFormControlTextarea1"
                                                                        ><strong
                                                                            >Notes</strong
                                                                        ></label
                                                                    >
                                                                    <p
                                                                        id="exampleFormControlTextarea1"
                                                                    >
                                                                        {{
                                                                            order.notes ===
                                                                            "null"
                                                                                ? "No Extra Notes"
                                                                                : order.notes
                                                                        }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End -->
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                    </div> -->
                                        <div
                                            class="row py-5 p-4 bg-white rounded shadow-sm"
                                        >
                                            <div class="col-lg-12">
                                                <div
                                                    class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold"
                                                >
                                                    Order summary
                                                </div>
                                                <div class="p-4">
                                                    <i
                                                        class="fas fa-exclamation-circle text-danger mr-1"
                                                    ></i>
                                                    <span
                                                        class="text-right text-danger"
                                                    >
                                                        for more details contact
                                                        <strong>
                                                            {{
                                                                order.restaurant
                                                                    .phone
                                                            }}
                                                        </strong>
                                                    </span>
                                                    <ul
                                                        class="list-unstyled mb-4"
                                                    >
                                                        <li
                                                            class="d-flex justify-content-between py-3 border-bottom"
                                                        >
                                                            <strong
                                                                class="text-muted"
                                                                >Order Subtotal </strong
                                                            ><strong
                                                                >EGP
                                                                {{ order.cost }}
                                                            </strong>
                                                        </li>
                                                        <li
                                                            class="d-flex justify-content-between py-3 border-bottom"
                                                        >
                                                            <strong
                                                                class="text-muted"
                                                                >Shipping and
                                                                handling</strong
                                                            ><strong
                                                                >+ EGP
                                                                {{
                                                                    order.delivery_fees
                                                                }}
                                                            </strong>
                                                        </li>
                                                        <li
                                                            class="d-flex justify-content-between py-3 border-bottom"
                                                        >
                                                            <strong
                                                                class="text-muted"
                                                                >Payment
                                                                Method</strong
                                                            ><strong
                                                                >Cash on
                                                                Delivery
                                                            </strong>
                                                        </li>
                                                        <li
                                                            class="d-flex justify-content-between py-3 border-bottom"
                                                        >
                                                            <strong
                                                                class="text-muted"
                                                                >Tax</strong
                                                            ><strong
                                                                >None</strong
                                                            >
                                                        </li>
                                                        <li
                                                            class="d-flex justify-content-between py-3 border-bottom"
                                                        >
                                                            <strong
                                                                class="text-muted"
                                                                >Total</strong
                                                            >
                                                            <h5
                                                                class="font-weight-bold"
                                                            >
                                                                EGP
                                                                {{
                                                                    order.total
                                                                }}
                                                            </h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
export default {
    computed: {
        ...mapGetters({
            orders: "order/getOrder",
            products: "order/getProducts"
        })
    },
    mounted() {
        this.$store.dispatch("order/getOrderItems");
    }
};
</script>
