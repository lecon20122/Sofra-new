<template>
    <div>
        <div class="container-fluid mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <div
                        v-for="(product , index ) in products"
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
                            class="align-items-center align-content-center col-md-3 border-left mt-1"
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
                            <div class="d-flex flex-column mt-4">
                                <form
                                    @submit.prevent="submit(product.id)"
                                    class="d-flex flex-column mt-4"
                                >
                                    <div class="col-lg-12 d-flex">
                                        <div class="col-lg-3">
                                            <input
                                                type="number"
                                                value="1"
                                                name=""
                                                id=""
                                                class="form-control"
                                                v-model="items.qty[index]"
                                            />
                                        </div>
                                        <div class="col-lg-9">
                                            <input
                                                type="text"
                                                placeholder="Notes"
                                                name=""
                                                id=""
                                                class="form-control"
                                                v-model="items.notes[index]"
                                            />
                                        </div>
                                    </div>
                                    <button
                                        class="btn btn-success btn-lg mt-2"
                                        type="submit"
                                    >
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["products"],
    data() {
        return {
            items: {
                productID: null,
                qty: [],
                notes: [],
            }
        };
    },
    methods: {
        submit(id) {
            this.items.productID = id;
            this.$swal('Hello Vue world!!!');
            console.log(this.items);
        }
    }
};
</script>
