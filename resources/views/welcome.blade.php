<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="">
            <h1>Member Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" require>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" require>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me </label>
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="btn">Sign in</button>

            <div class="register-link">
                <p>Don't have an account? <a href="#">Sign In Here!</a></p>
            </div>
        </form>
</div>
</body>