<template>
    <div>
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card w-75 mx-auto">
                        <div class="card-header">
                            Register
                        </div>
                        <div class="card-body">
                            <div
                                class="alert alert-success"
                                role="alert"
                                v-if="message"
                            >
                                {{ message }}
                            </div>
                            <form @submit.prevent="submit">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input
                                        type=""
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    data() {
        return {
            name: null,
            email: null,
            password: null,
            errors: [],
            message: null,
        };
    },
    methods: {
        ...mapActions({
            profile: "auth/profile"
        }),
        submit() {
            this.profile({
                payload: {
                    name: this.name,
                    email: this.email,
                    password: this.password
                },
                context: this
            });
        }
    },
    computed: {
        ...mapGetters({
            user: "auth/user"
        })
    }
};
</script>
