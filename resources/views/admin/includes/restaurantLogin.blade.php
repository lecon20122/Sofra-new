    <div class="registration-form">
        <form action="{{ route('restaurant-auth') }}" method="POST">
            @csrf
            <div class="form-icon">
                <span><i class="fa fa-lock"></i></span>
            </div>
            @if ($errors->any())
                <h5 class="text-danger alert">{{ $errors->first() }}</h5>
            @endif
            <div class="form-group">
                <input type="tel" class="form-control item" id="phone" placeholder="Phone Number" name="phone">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Password" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Login</button>
            </div>
        </form>
        <div class="social-media">
            <h5>&copy; 2021</h5>

        </div>
    </div>
