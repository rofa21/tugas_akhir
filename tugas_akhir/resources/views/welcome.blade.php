@include('logregis.headergis')

@include('logregis.navgis')
<style>
    body{
        background-image: url('/img/2.jpg');
        background-size: 1400px;
    }

    .btn{
        color:black;
        background-color: white;
        font-weight: bold; /* Membuat teks tebal */
    }

    h1{
        font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
            font-weight: 700; /* Membuat teks tebal */
            font-size: 2.5em; /* Mengatur ukuran font */
            color:white;
    }
</style>
<body>
<div class="wrapper">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h1>Member Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox" name="remember"> Remember me </label>
                <a href="#">Forgot password?</a>
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <button type="submit" class="btn">Sign in</button>

            <div class="register-link">
                <p>Don't have an account? <a href="{{ route('register.form') }}">Sign Up Here!</a></p>
            </div>
        </form>
    </div>
</body>
</html>

@yield('contentgis')

@include('logregis.footergis')