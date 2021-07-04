<template>
    <div>
        <!-- Footer -->
        <footer class="footer">
            <div style="background-color: #e16036;">
                <div class="container">
                    <!-- Grid row-->
                    <div class="row py-4 d-flex align-items-center">
                        <!-- Grid column -->
                        <div
                            class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0"
                        >
                            <h6 class="mb-0 text-white">
                                Get connected with us on social networks!
                            </h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div
                            class="col-md-6 col-lg-7 text-center text-md-right"
                        >
                            <!-- Facebook -->
                            <a class="fb-ic">
                                <i class="fab fa-facebook-f text-white mr-4">
                                </i>
                            </a>
                            <!-- Twitter -->
                            <a class="tw-ic">
                                <i class="fab fa-twitter text-white mr-4"> </i>
                            </a>
                            <!-- Google +-->
                            <a class="gplus-ic">
                                <i class="fab fa-google-plus-g text-white mr-4">
                                </i>
                            </a>
                            <!--Linkedin -->
                            <a class="li-ic">
                                <i class="fab fa-linkedin-in text-white mr-4">
                                </i>
                            </a>
                            <!--Instagram-->
                            <a class="ins-ic">
                                <i class="fab fa-instagram text-white"> </i>
                            </a>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row-->
                </div>
            </div>

            <!-- Footer Links -->
            <div
                class="container text-center text-md-left mt-5"
            >
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div
                        class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-white d-none d-md-block"
                    >
                        <!-- Content -->
                        <h4 class="text-uppercase font-weight-bold font-size-brand">
                            سفرة
                        </h4>


                        <hr
                            class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px;"
                        />
                        <p>
                            Here you can use rows and columns to organize your
                            footer content. Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div
                        class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 text-white d-none d-md-block"
                    >
                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">
                            Cities
                        </h6>
                        <hr
                            class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto border-bottom"
                            style="width: 45px;"
                        />
                        <p>
                            <a href="#" class="text-white text-decoration-none">Cario</a>
                        </p>
                        <!-- <p>
                            <a href="#!" class="text-white"></a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">BrandFlow</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white"
                                >Bootstrap Angular</a
                            >
                        </p> -->
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div
                        class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-white d-none d-lg-block"
                    >
                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">
                            Useful links
                        </h6>
                        <hr
                            class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto border-bottom"
                            style="width: 98px;"
                        />
                        <p>
                            <a href="#!" class="text-white">Your Account</a>
                        </p>
                        <p>
                            <a href="http://127.0.0.1:8000/become-a-partner" class="text-white"
                                >Become a Partner</a
                            >
                        </p>
                        <p>
                            <a class="text-white"><router-link
                                        class="text-white text-decoration-none"
                                        :to="{ name: 'Restaurants' }"
                                        >Restaurants</router-link
                                    ></a>
                        </p>
                        <!-- <p>
                            <a href="#!" class="text-white">Help</a>
                        </p> -->
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div
                        class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-white"
                    >
                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Contact</h6>
                        <hr
                            class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto border-bottom"
                            style="width: 67px;"
                        />
                        <p>
                            <i class="fas fa-home mr-3"></i> Cairo , Nasr City
                        </p>
                        <p>
                            <i class="fas fa-envelope mr-3"></i>
                            Sofra@info.com
                        </p>
                        <p><i class="fas fa-phone mr-3"></i> + 20 234 567 88</p>
                        <p><i class="fas fa-print mr-3"></i> + 20 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3 bg-black text-white">
                © 2021 Copyright:
                <a href="#" class="text-white"> Sofra.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
</template>
