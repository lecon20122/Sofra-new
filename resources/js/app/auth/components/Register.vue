<template>
    <div>
        <div class="container-sm py-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="registration-form">
                        <form @submit.prevent="submit">
                            <div class="form-icon">
                                <span><i class="fa fa-user-plus"></i></span>
                            </div>
                            <!-- Error Display div -->
                            <div
                                class="alert alert-danger"
                                role="alert"
                                v-if="errors.root"
                            >
                                {{ errors.root }}
                            </div>
                            <!-- Error Display div -->
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control item"
                                    id="name"
                                    placeholder="Name"
                                    v-model="name"
                                    v-bind:class="{
                                        'is-invalid': errors.name
                                    }"
                                />
                                <div
                                    id="name"
                                    class="invalid-feedback"
                                    v-if="errors.name"
                                >
                                    {{ errors.name[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control item"
                                    id="email"
                                    placeholder="Email"
                                    v-model="email"
                                    v-bind:class="{
                                        'is-invalid': errors.email
                                    }"
                                />
                                <div
                                    id="email"
                                    class="invalid-feedback"
                                    v-if="errors.email"
                                >
                                    {{ errors.email[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <input
                                    type="password"
                                    class="form-control item"
                                    id="password"
                                    placeholder="Password"
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
                            <div class="form-group">
                                <button
                                    type="submit"
                                    class="btn btn-block create-account"
                                >
                                    Create Account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from "vuex";
import register from "../../restaurants/components/Register.vue";
export default {
    components: {
        "restaurant-register": register
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
            })
        }
    }
};
</script>
