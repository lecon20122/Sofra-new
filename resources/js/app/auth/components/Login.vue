<template>
    <div>
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="registration-form py-5">
                        <form @submit.prevent="submit">
                            <div class="form-icon">
                                <span><i class="fa fa-user"></i></span>
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
                                    Login
                                </button>
                            </div>
                        </form>
                        <div class="social-media">
                            <h5>&copy; 2021</h5>

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
import { isEmpty } from "lodash";

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
<style>
body {
    background-color: #dee9ff;
}

.registration-form {
    padding: 50px 0;
}

.registration-form form {
    background-color: #fff;
    max-width: 600px;
    margin: auto;
    padding: 50px 70px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .form-icon {
    text-align: center;
    background-color: #e16036;
    border-radius: 50%;
    font-size: 40px;
    color: white;
    width: 100px;
    height: 100px;
    margin: auto;
    margin-bottom: 50px;
    line-height: 100px;
}

.registration-form .item {
    border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
}

.registration-form .create-account {
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    background-color: #e16036;
    border: none;
    color: white;
    margin-top: 20px;
}

.registration-form .social-media {
    max-width: 600px;
    background-color: #fff;
    margin: auto;
    padding: 35px 0;
    text-align: center;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    color: #9fadca;
    border-top: 1px solid #dee9ff;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .social-icons {
    margin-top: 30px;
    margin-bottom: 16px;
}

.registration-form .social-icons a {
    font-size: 23px;
    margin: 0 3px;
    color: #5691ff;
    border: 1px solid;
    border-radius: 50%;
    width: 45px;
    display: inline-block;
    height: 45px;
    text-align: center;
    background-color: #fff;
    line-height: 45px;
}

.registration-form .social-icons a:hover {
    text-decoration: none;
    opacity: 0.6;
}

@media (max-width: 576px) {
    .registration-form form {
        padding: 50px 20px;
    }

    .registration-form .form-icon {
        width: 70px;
        height: 70px;
        font-size: 30px;
        line-height: 70px;
    }
}
</style>
