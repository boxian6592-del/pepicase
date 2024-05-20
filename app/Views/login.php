<?php include(APPPATH.'views/components/usual-links.php'); ?>
<link rel="stylesheet" href="/pepicase/public/css/login.css">
<?php include(APPPATH.'views/components/top-header.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <div class="wrapper">
        <div class="form-container">
        <h2 class="text-center" style="margin: 0px; margin-bottom: 20px; color: #1F3E97; font-family: 'Londrina Solid';"><b>LOGIN</b></h2>
            <form method="post" action="/pepicase/public/login" onsubmit="return validateEmail()">
                <div class="form-group">
                    <label style="color: #1F3E97; " for="email"><b>Email</b></label>
                    <span class="form-required">*</span>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Abc123@gmail.com"required>
                    <div id="emailError" style="color: red; display: none;">Please enter a valid email address.</div>                   
                </div>
                <div class="form-group">
                    <label for="password" style="color:#1F3E97;"><b>Password</b></label>
                    <span class="form-required">*</span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Abc123" required>
                    <span class="input-group-text" id="toggle_password">
                            <img style="margin: 0px;" src="/pepicase/public/pics/Ellipse.svg" alt="">
                    </span>
                </div>
                <div class="text-center">
                    <button class="button" style="background-color:#FFE57A; color:black; margin-top:30px;" type="submit">LOGIN</button>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <hr class="flex-grow-1">
                    <span style="padding: 5px;">OR</span>
                    <hr class="flex-grow-1">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="https://www.facebook.com/login">
                        <button type="button" class="button">
                            <img style="width: 15px; height: 15px; margin-right: 5px; margin-bottom:0;" src="/pepicase/public/pics/Facebook_icon.svg" alt="facebook">
                        Facebook</button>                   
                    </a>

                    <a href="https://accounts.google.com/v3/signin/confirmidentifier?checkedDomains=youtube&ddm=0&flowEntry=ServiceLogin&flowName=GlifWebSignIn&hl=vi-VN&ifkv=AaSxoQxF7iM5g2X5560Y9hKDGUHW_NKArdkEMVOy7FzmTEXCeEMDlN1nDxJ3wAzQcMkWNJrY6jIvBw&pstMsg=1&service=chromiumsync&dsh=S-1828235792%3A1715516019848185">
                        <button class="button" style="text-decoration: none;width:103px;">
                            <img style="width: 20px; height: 20px; margin-right: 5px" src="/pepicase/public/pics/Google_Icons-09-512.webp" alt="google">
                        Google</button>
                    </a> 
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <a style="color: #1F3E97; font-size:14px" href="/pepicase/public/resetPassword">Forgot your password?</a>
                    <a style="color: #1F3E97; font-size:14px" href="/pepicase/public/signup">Create an account</a>
                </div>
            </form>
        </div>
    </div>
    <script>
    function validateEmail() {
        var email = document.getElementById('email').value;
        var emailError = document.getElementById('emailError');
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailPattern.test(email)) {
            emailError.style.display = 'block';
            return false;
        }
        emailError.style.display = 'none';
        return true;
    }
    document.getElementById('toggle_password').addEventListener('click', function() {
                var passwordInput = document.getElementById('password');
                if (passwordInput.type == 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            }); 
    </script>
</body>
</html>
