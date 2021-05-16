<template>
    <div>
        <div class="container-fluid mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <div
                        v-for="product in products"
                        :key="product.id"
                        class="row p-2 bg-white border rounded"
                    >
                        <div class="col-md-3 mt-1">
                            <img
                                class="img-fluid img-responsive rounded product-image"
                                :src="product.image"
                                style="width: 100%;"
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
                            <!-- <div class="mt-1 mb-1 spec-1">
                                        <span>100% cotton</span
                                        ><span class="dot"></span
                                        ><span>Light weight</span
                                        ><span class="dot"></span
                                        ><span>Best finish<br /></span>
                                    </div>
                                    <div class="mt-1 mb-1 spec-1">
                                        <span>Unique design</span
                                        ><span class="dot"></span
                                        ><span>For men</span
                                        ><span class="dot"></span
                                        ><span>Casual<br /></span>
                                    </div> -->
                            <p class="text-justify para mb-0">
                                {{ product.short_description }}
                                <br />
                            </p>
                        </div>
                        <div
                            class="align-items-center align-content-center col-md-3 border-left mt-1"
                        >
                            <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1">EGP {{ product.price }}</h4>
                            </div>
                            <h6 class="text-success"><i class="fa fa-clock"></i> Ready in {{ product.ready_in }} Minutes</h6>
                            <div class="d-flex flex-column mt-4">
                                <button
                                    class="btn btn-primary btn-sm"
                                    type="button"
                                >
                                    Details</button
                                ><button
                                    class="btn btn-success btn-sm mt-2"
                                    type="button"
                                >
                                    Add to Cart
                                </button>
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
    props: ["products"]
};
</script>
