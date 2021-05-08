<template>
    <div>
        <div class="container-sm py-3">
            <div class="row">
                <div class="col-md-12">

                    <ul
                        class="nav nav-pills mb-3"
                        id="pills-tab"
                        role="tablist"
                    >
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="pills-home-tab"
                                data-toggle="pill"
                                href="#pills-home"
                                role="tab"
                                aria-controls="pills-home"
                                aria-selected="true"
                                >Client</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="pills-profile-tab"
                                data-toggle="pill"
                                href="#pills-profile"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false"
                                >Restaurant</a
                            >
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div
                            class="tab-pane fade show active"
                            id="pills-home"
                            role="tabpanel"
                            aria-labelledby="pills-home-tab"
                        >
                            <form @submit.prevent="submit">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input
                                        type="name"
                                        class="form-control"
                                        id="name"
                                        aria-describedby="emailHelp"
                                        v-model="name"
                                        v-bind:class="{
                                            'is-invalid': errors.name
                                        }"
                                    />
                                    <div
                                        id="password"
                                        class="invalid-feedback"
                                        v-if="errors.name"
                                    >
                                        {{ errors.name[0] }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        aria-describedby="emailHelp"
                                        v-model="email"
                                        v-bind:class="{
                                            'is-invalid': errors.email
                                        }"
                                    />
                                    <div
                                        id="password"
                                        class="invalid-feedback"
                                        v-if="errors.email"
                                    >
                                        {{ errors.email[0] }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        v-model="password"
                                        v-bind:class="{
                                            'is-invalid': errors.password
                                        }"
                                    />
                                    <div
                                        id="password"
                                        class="invalid-feedback"
                                        v-if="errors.password"
                                    >
                                        {{ errors.password[0] }}
                                    </div>
                                </div>
                                <button name="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </form>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="pills-profile"
                            role="tabpanel"
                            aria-labelledby="pills-profile-tab"
                        >
                        <restaurant-register></restaurant-register>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="pills-contact"
                            role="tabpanel"
                            aria-labelledby="pills-contact-tab"
                        >
                            ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from "vuex";
import register from '../../restaurants/components/Register.vue'
export default {
    components: {
        'restaurant-register' : register
    },
    data() {
        return {
            name: null,
            email: null,
            password: null,
            errors: []
        };
    },
    methods: {
        ...mapActions({
            register: "auth/register"
        }),
        submit() {
            this.register({
                payload: {
                    name: this.name,
                    email: this.email,
                    password: this.password
                },
                context: this
            }).then(() => {
                this.$router.replace({ name: "Home" });
            });
        }
    }
};
</script>
