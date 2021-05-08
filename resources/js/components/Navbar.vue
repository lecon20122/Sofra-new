<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light nav-background">
            <div class="container sm">
                <a class="navbar-brand">
                    <router-link class="text-white font-size-brand text-decoration-none" :to="{ name: 'Home' }">سفرة</router-link></a
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
                    <span class="navbar-toggler-icon"></span>
                </button> 
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav ml-auto ">
                        <div
                            class="navbar-nav"
                            v-if="
                                user.authenticated || restaurants.authenticated
                            "
                        >
                            <li class="nav-item active">
                                <a class="nav-link"
                                    ><router-link class="text-white" :to="{ name: 'Timeline' }"
                                        >Timeline</router-link
                                    ></a
                                >
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    {{
                                        user.data.name
                                            ? user.data.name
                                            : restaurants.data.name
                                    }}
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
                        </div>
                        <div
                            class="navbar-nav font-size"
                            v-if="
                                !user.authenticated ||
                                    !restaurants.authenticated
                            "
                        >
                            <li class="nav-item active">
                                <a class="nav-link text-white">All Restaurants</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link"
                                    ><router-link  class="btn btn-outline-light btn-lg" :to="{ name: 'Login' }"
                                        >Login</router-link
                                    ></a
                                >
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link"
                                    ><router-link class="text-white text-decoration-none" :to="{ name: 'Register' }"
                                        >Register</router-link
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
            restaurants: "restaurants/user"
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
