<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light nav-background">
            <div class="container sm">
                <a class="navbar-brand">
                    <router-link
                        class="text-white font-size-brand text-decoration-none"
                        :to="{ name: 'Home' }"
                        >سفرة</router-link
                    ></a
                >
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span><i class="fa fa-bars text-white"></i></span>
                </button>
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav ml-auto font-size ">
                        <div class="navbar-nav">
                            <li class="nav-item active font-size">
                                <a class="nav-link"
                                    ><router-link
                                        class="text-white text-decoration-none"
                                        :to="{ name: 'Restaurants' }"
                                        >Restaurants</router-link
                                    ></a
                                >
                            </li>
                        </div>
                        <div class="navbar-nav" v-if="user.authenticated">
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle text-white"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    {{ user.data.name }}
                                </a>
                                <div
                                    class="dropdown-menu"
                                    aria-labelledby="navbarDropdown"
                                >
                                    <a class="dropdown-item" href="#"
                                        ><router-link :to="{ name: 'Profile' }"
                                            >Profile</router-link
                                        ></a
                                    >
                                    <div class="dropdown-divider"></div>
                                    <a
                                        class="dropdown-item"
                                        href="#"
                                        @click.prevent="signout"
                                        >Logout</a
                                    >
                                </div>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link"
                                    ><router-link
                                        class="text-white text-decoration-none"
                                        :to="{ name: 'Order' }"
                                        >My Orders</router-link
                                    ></a
                                >
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link"
                                    ><router-link
                                        class="text-white text-decoration-none"
                                        :to="{ name: 'Cart' }"
                                        ><i class="fa fa-shopping-cart"></i>
                                        <span
                                            class="badge badge-warning "
                                            id="lblCartCount"
                                        ></span
                                        >Cart</router-link
                                    ></a
                                >
                            </li>
                        </div>
                        <div
                            class="navbar-nav font-size"
                            v-if="!user.authenticated"
                        >
                            <li class="nav-item active">
                                <a class="nav-link"
                                    ><router-link
                                        class="btn btn-outline-light btn-lg"
                                        :to="{ name: 'Login' }"
                                        >تسجيل الدخول</router-link
                                    ></a
                                >
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link"
                                    ><router-link
                                        class="text-white text-decoration-none"
                                        :to="{ name: 'Register' }"
                                    >
                                        سجل الان</router-link
                                    ></a
                                >
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
            <!-- Container -->
        </nav>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
    computed: {
        ...mapGetters({
            user: "auth/user",
            items: "cart/getItems"
        })
    },
    methods: {
        ...mapActions({
            logout: "auth/logout"
        }),
        signout() {
            this.logout().then(() => {
                this.$router.replace({ name: "Home" });
            });
        }
    }
};
</script>
