    <style>
        .font-color {
            color: #0643FF;
            font-weight: bolder;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
        }

    </style>
    <div class="registration-form">
        <form action="{{ route('restaurant-auth') }}" method="POST">
            @csrf
            <h1 class="text-center py-4 font-color">Join Us Now!</h1>
            @if ($errors->any())
                <h5 class="text-danger alert">{{ $errors->first() }}</h5>
            @endif
            <div class="form-group">
                <input type="text" class="form-control item" id="email" placeholder="Store name" name="name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" placeholder="Email address" name="email">
            </div>
            <div class="form-group">
                <input type="tel" class="form-control item" id="phone" placeholder="EG +20 01*******" name="phone">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="address" placeholder="Store address" name="address">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Password" name="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Join Now</button>
            </div>
        </form>
        <div class="social-media">
            <h5>&copy; 2021</h5>

        </div>
    </div>
