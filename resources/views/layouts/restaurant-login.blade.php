<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<style>
    a {
        color: black;
    }

    html {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        height: 100vh;
    }

    .background {
        min-height: 100vh;
        background-image: linear-gradient(
                rgba(0, 0, 0, 0.3),
                rgba(0, 0, 0, 0.3)),
            url("../images/become-a-partner3.jpg");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    #outer {
        width: 100%;
        height: 100vh;
        display: flex;
    }

    #inner {
        margin: auto;
        font-family: sans-serif;
        font-weight: bolder
    }

</style>

<body>
    <section class="background">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="outer" class="container">
                        <div id="inner">
                            <h1 class="text-white display-3">Reach new customers, get more sales</h1>
                            <h3 class="text-white">Join Sofra Now,</h3>
                        </div>
                    </div>
                    <h1 class="text-white align-middle"></h1>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <div class="h-100 d-flex justify-content-center align-items-start mt-5 mr-4">
                            <ul class="nav nav-pills mt-5" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active text-white" id="pills-home-tab" data-toggle="pill"
                                        href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Become
                                        a Partner</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-white" id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Already a Partner ? Login</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                @include('admin.includes.restaurantRegister')
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                @include('admin.includes.restaurantLogin')
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
