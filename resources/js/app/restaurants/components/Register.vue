<template>
    <div>
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
                <div id="password" class="invalid-feedback" v-if="errors.name">
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
                <div id="password" class="invalid-feedback" v-if="errors.email">
                    {{ errors.email[0] }}
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input
                    type="phone"
                    class="form-control"
                    id="phone"
                    aria-describedby="emailHelp"
                    v-model="phone"
                    v-bind:class="{
                        'is-invalid': errors.phone
                    }"
                />
                <div id="password" class="invalid-feedback" v-if="errors.email">
                    {{ errors.phone[0] }}
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
</template>

<script>
import { mapActions } from "vuex";
export default {
    data() {
        return {
            name: null,
            email: null,
            password: null,
            phone: null,
            errors: []
        };
    },
    methods: {
        ...mapActions({
            register: "restaurants/register"
        }),
        submit() {
            this.register({
                payload: {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    phone: this.phone
                },
                context: this
            })
        }
    }
};
</script>
