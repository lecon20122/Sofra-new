<template>
    <div>
        <div class="container py-5">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button
                                class="btn btn-link btn-block text-left text-dark text-decoration-none"
                                type="button"
                                data-toggle="collapse"
                                data-target="#collapseOne"
                                aria-expanded="true"
                                aria-controls="collapseOne"
                            >
                                Collapsible Group Item #1
                            </button>
                        </h2>
                    </div>

                    <div
                        id="collapseOne"
                        class="collapse show"
                        aria-labelledby="headingOne"
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
                                                        <tbody

                                                        >
                                                            <tr>
                                                                <th scope="row">
                                                                    <div
                                                                        class="p-2"
                                                                    >
                                                                        <img
                                                                            alt=""
                                                                            width="70"
                                                                            class="img-fluid rounded shadow-sm"
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
                                                                                </p>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </th>

                                                                <td
                                                                    class="align-middle"
                                                                >
                                                                    <strong
                                                                        >EGP</strong
                                                                    >
                                                                </td>
                                                                <td
                                                                    class="align-middle"
                                                                >
                                                                    <p
                                                                        id="exampleFormControlTextarea1"
                                                                    ></p>
                                                                </td>
                                                                <td
                                                                    class="align-middle"
                                                                >
                                                                    <p
                                                                        id="exampleFormControlTextarea1"
                                                                    ></p>
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
                                                                        >Address</label
                                                                    >
                                                                    <p
                                                                        id="exampleFormControlTextarea1"
                                                                    ></p>
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
                                                                        >Notes</label
                                                                    >
                                                                    <p
                                                                        id="exampleFormControlTextarea1"
                                                                    ></p>
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
                                                                >+ EGP 20
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
    // methods: {
    //     ...mapActions({
    //         getOrder: "order/getOrderItems",
    //     })


    // },
    mounted() {
        this.$store.dispatch("order/getOrderItems");
    }
};
</script>
