@extends('logregis.layoutgis.mastergis')

@section('contentgis')
    

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");


body{
	
	
    background-image: url('/img/2.jpg');
        background-size: 1400px;
}


</style>


   
    <div class="form">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <h1>Registration</h1>

            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="nama" placeholder="Full Name" value="{{ old('nama') }}" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-field">
                    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                    <i class='bx bxs-user'></i>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-field">
                    <input type="text" name="telepon" placeholder="Number" value="{{ old('telepon') }}" required>
                    <i class='bx bxs-phone-call'></i>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-field">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
            </div>

            <label>
                <input type="checkbox" required>
                I hereby declare that the above information provided is true and correct
            </label>

            <button type="submit" class="btn">Registration</button>
        </form>
    </div>
  



</html>

@endsection