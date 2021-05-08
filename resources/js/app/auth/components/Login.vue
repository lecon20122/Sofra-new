<template>
    <div>
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card w-75 mx-auto">
                        <div class="card-header">
                            Login
                        </div>
                        <div class="card-body">
                            <div
                                class="alert alert-danger"
                                role="alert"
                                v-if="errors.root"
                            >
                                {{ errors.root }}
                            </div>
                            <form @submit.prevent="submit">
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
                                <!-- <div class="form-group form-check">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        v-model="remember_token"
                                        id="exampleCheck1"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="exampleCheck1"
                                        >Remember me</label
                                    >
                                </div> -->
                                <button name="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from "vuex";
import localforage from "localforage";
import { isEmpty, reject } from "lodash";

export default {
    data() {
        return {
            email: null,
            password: null,
            errors: []
        };
    },
    methods: {
        ...mapActions({
            login: "auth/login"
        }),
        submit() {
            this.login({
                payload: {
                    email: this.email,
                    password: this.password
                },
                context: this
            }).then(() => {
                localforage.getItem("intended").then(name => {
                    if (isEmpty(name)) {
                        this.$router.replace({ name: "Home" });
                    }
                    this.$router.replace({ name: name });
                });
            });
        }
    }
};
</script>
