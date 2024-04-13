<?php
    require_once 'connection/connection.php';
?>
<?php
    if(isset($_POST['sign'])){
        $user = mysqli_real_escape_string($connection,$_POST['uname']);
        $fname = mysqli_real_escape_string($connection,$_POST['fname']);
        $lname = mysqli_real_escape_string($connection,$_POST['lname']);
        $mail = mysqli_real_escape_string($connection,$_POST['mail']);
        $pswd = mysqli_real_escape_string($connection,$_POST['pswd']);

        $sql2 = "INSERT INTO users (username,firstname,lastname,mails,pswd) VALUES('{$user}','{$fname}','{$lname}','{$mail}','{$pswd}')";
        $result2 = mysqli_query($connection,$sql2);

        if(isset($result2)){
            header('Location: index.php');
        }else{
            echo "Code not inserted";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body, input, button {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
    }

    .container {
        position: relative;
        width: 100%;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #f0f2f5;
    }

    .forms-container {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .signin-signup {
        position: relative;
        width: 50%;
        display: flex;
        justify-content: space-between;
    }

    form {
        width: 50%;
    }

    .sign-in-form {
        z-index: 2;
    }

    .sign-up-form {
        z-index: 1;
    }

    .title {
        font-size: 2.2rem;
        color: #333;
        margin-bottom: 10px;
    }

    .input-field {
        position: relative;
        margin-bottom: 25px;
    }

    .input-field input {
        width: 100%;
        padding: 15px 20px;
        border: none;
        outline: none;
        background: #f0f2f5;
        color: #333;
        font-size: 18px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .input-field input:focus {
        border: 2px solid #333;
    }

    .btn {
        width: 100%;
        padding: 15px 20px;
        border: none;
        outline: none;
        background: #333;
        color: #fff;
        font-size: 18px;
        cursor: pointer;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background: #555;
    }

    .transparent {
        background: transparent;
        border: 2px solid #333;
        color: #333;
    }

    .panel {
        position: absolute;
        width: 50%;
        height: 100%;
        top: 0;
        transition: transform 0.6s ease-in-out;
    }

    .left-panel {
        left: 0;
        transform: translateX(-100%);
        background: #f0f2f5;
    }

    .right-panel {
        right: 0;
        transform: translateX(100%);
        background: #333;
        color: #fff;
    }

    .panel.active {
        transform: translateX(0%);
    }

    .panel .content {
        padding: 50px;
        text-align: center;
    }

    .panel h3 {
        font-size: 2.2rem;
        margin-bottom: 20px;
    }

    .panel p {
        font-size: 18px;
        margin-bottom: 30px;
    }

    .fa {
        margin-right: 10px;
    }

    </style>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="signup.php" method="post" class="sign-up-form">
                    <h2 class="title">Sign Up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="uname" placeholder="Username" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="mail" placeholder="Email" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="pswd" placeholder="Password" required>
                    </div>
                    <input type="submit" class="btn" name="sign" value="Sign up">
                </form>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>
</html>
