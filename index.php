<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>

<body>
    <div class="Home">
        <a href="trangchu"><img src="images/home.png" alt=""></a>
    </div>
    <div class="container" id="container">
        <div class="form-container register-container">
            <form method="POST" action="index.php">
                <h1>Register hire.</h1> 
                <input type="text" name="Ho" placeholder="Last Name">
                <input type="text" name="Ten" placeholder="First Name">
                <input type="date" name="NgaySinh"  placeholder="Birthday">
                <input type="number" name="SDT"  placeholder="Phone">
                <input type="email" name="email" placeholder="Email">
                <input type="password"  name="password" placeholder="Password">
                <button type="submit" name="btn_register">Register</button>
                <?php include('xulyregister.php');?>
            </form>
        </div>
        <div class="form-container login-container">
            <form method="POST" action="index.php">
                <h1>Login hire.</h1>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" style="" placeholder="Nhập Mật Khẩu"  required>
                <button type="submit" name="btn_submit">Login</button> 
                <?php include('xulylogin.php');?>
                
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">Hello <br> friends</h1>
                    <p>if Yout have an account, login here</p> 
                    <button class="ghost" id="login">Login <i class="lni lni-arrow-left login"></i> </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">Start yout <br> journy now</h1>
                    <p>if you don't have an account yet, join us and start your journey.</p> 
                    <button class="ghost" id="register">Register <i class="lni lni-arrow-right register"></i> </button>
                </div>
            </div>
        </div>
    </div>
    <script src="login.js"></script>
</body>

</html>