<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>pepicase</title>
        <link rel="stylesheet" href="/pepicase/public/css/signup_new.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&family=Lexend:wght@100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Tera:wght@100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/pepicase/public/fonts.css">
        <link rel="stylesheet" href="/pepicase/public/login.css">
        <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300;400;900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class = "lexend-deca sales d-flex justify-content-center align-items-center" style ="margin: 0px; font-size: 15px;">
            <div align = "center"><text>Free Shipping worldwide for<br>orders $30 or above</text></div>
            <div style="padding-left:165px; padding-right:165px;" align = "center"><text>ALL PHONE CASES: Limited-time<br>40% Off</text></div>
            <div align = "center"><text>30 days free replacements<br>for quality issues.</text></div>
        </div>

        <!-- header -->
        <header>
            <div class="header">
                <div class="top_header">
                    <nav class="d-flex justify-content-between" >
                        <a href="" id="search">
                            <img src="/pepicase/public/pics/Search.png" alt="">
                        </a>
                        <h2 class="name"><a href="/pepicase/public/" style = "color:inherit; text-decoration:none; font-family: 'Londrina Solid'">pepicase</a></h2>
                        <div class="logo_right">
                            <a href="" style="margin-right:20px; text-decoration: none; color:white;">
                                <img src="/pepicase/public/pics/Vector (1).png" alt="">
                            </a>
                            <a href="" style="margin-right: 20px; text-decoration: none; color:white;">
                                <img src="/pepicase/public/pics/Cart.png" alt="">
                            </a>
                            <a href="">
                                <img src="/pepicase/public/pics/Frame.png" alt="">
                            </a>
                        </div>
                    </nav>
                </div>
                <div class="bottom_header">
                    <nav class="container">
                        <ul id="main_menu">
                            <li><a style="font-family: 'Lexend';" href="">New & Featured</a></li>

                            <li><a style="font-family: 'Lexend';" href="/pepicase/public/product/">Products</a></li>

                            <li><a style="font-family: 'Lexend';" href="/pepicase/public/collections">Collections</a></li>

                            <li><a style="font-family: 'Lexend';" href="/pepicase/public/about-us/">About Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <!-- body -->
        <div class="d-flex align-items-center justify-content-center">
            <form action="">
                <h2 class="text-center" style="margin: 0px; margin-bottom: 20px; color: #1F3E97; font-family: 'Lexend';"><b>SIGN UP</b></h2>

                <div class="mb-3">
                    <label for="email" class="form-label"><b>Email</b></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Abc123@gmail.com">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label"><b>Password</b></label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Abc12345" style="border-right: none;">
                        <img style="margin: 0px; background: white; cursor: pointer; border-left: none;" class="input-group-text" id="toggle_password" src="/pepicase/public/pics/Ellipse.svg" alt="">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label"><b>Confirm password</b></label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Abc12345" style="border-right: none;">
                        <span style="background: white; cursor: pointer; border-left: none;" class="input-group-text">
                            <img style="margin: 0px;" id="toggle_confirm_password" src="/pepicase/public/pics/Ellipse.svg" alt="">
                        </span>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-primary" 
                    style = "width: 100%; margin-top: 20px; background-color: #FFE57A; border-color: black; transition: background-color 0.3s; color:black; font-family: 'Lexend'"
                    onclick="checkpassword()">SIGN UP</a>
                </div>

                <div class="d-flex justify-content-center" style="margin-top: 30px; margin-bottom: 30px">
                    <hr class="before" style="width: 100%">
                    <text style="padding: 5px; font-family: 'Lexend'">OR</text>
                    <hr class="last" style="width: 100%">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="https://www.facebook.com/login">
                        <button type="button" class="button">
                            <img style="width: 24px; height: 24px; margin-right: 5px" src="/pepicase/public/pics/Facebook_icon.svg" alt="facebook">
                        Facebook</button>                   
                    </a>

                    <a href="https://accounts.google.com/v3/signin/confirmidentifier?checkedDomains=youtube&ddm=0&flowEntry=ServiceLogin&flowName=GlifWebSignIn&hl=vi-VN&ifkv=AaSxoQxF7iM5g2X5560Y9hKDGUHW_NKArdkEMVOy7FzmTEXCeEMDlN1nDxJ3wAzQcMkWNJrY6jIvBw&pstMsg=1&service=chromiumsync&dsh=S-1828235792%3A1715516019848185">
                        <button class="button" style="text-decoration: none;">
                            <img style="width: 26px; height: 26px; margin-right: 5px" src="/pepicase/public/pics/Google_Icons-09-512.webp" alt="google">
                        Google</button>
                    </a> 
                </div>

                <div class="d-flex justify-content-center" id="check_account">
                    <p style="color: #A7A7A7; margin-right: 8px">Have an account?</p>
                    <a style="color: #844700;" href="/pepicase/public/">Login</a>
                </div>
            </form>
        </div>

        <!-- footer -->
        <footer class="footer">
        <div class = "main-content">
            <p class="title">Address</p>
            <div class="footer-a">
                <a href=""><img src="/pepicase/public/pics/location.svg" alt="location-icon"></a><br>
                <a href=""><img src="/pepicase/public/pics/sms.svg" alt="sms-icon"></a><br>
                <a href=""><img src="/pepicase/public/pics/call.svg" alt="call-icon"></a>
            </div>
        </div>

            <div class ="icons d-flex justify-content-center align-items-center" style = "height: 250px; padding-bottom: 30px;">
                <a href=""><img src="/pepicase/public/pics/Facebook Icon.png" class = "img-rounded" alt="facebook-icon" style ="margin-right: 40px;"></a>
                <a href=""><img src="/pepicase/public/pics/Group 1.png" class = "img-rounded" alt="facebook-icon"></a>
                <a href=""><img src="/pepicase/public/pics/x.png" class = "img-rounded" alt="facebook-icon" style ="margin-left: 40px;"></a>
            </div>

            <div class = "bottom-nav lexend" style = "margin-left: 45px; padding-bottom: 20px; font-size: 20px;">
                <a href="">TERMS OF USE</a>
                <a href="">PRIVACY POLICY</a>
                <a href="">PR/COLLAB</a>
                <a href="">COPYRIGHT INFO</a>
                <a href="">FAQs</a>
                <a href="">HELP</a>
            </div>
        </footer>
        <script>
            // nhấn vào con mắt sẽ hiện ra password
            document.getElementById('toggle_password').addEventListener('click', function() {
                var passwordInput = document.getElementById('password');
                if (passwordInput.type == 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            }); 
            document.getElementById('toggle_confirm_password').addEventListener('click', function() {
                var passwordInput = document.getElementById('confirm_password');
                if (passwordInput.type == 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            });
        </script>

        
        <!-- <script>
            // nhấn vào con mắt sẽ hiện ra password
            document.getElementById('toggle_password').addEventListener('click', function() {
                var passwordInput = document.getElementById('password_input');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            }); 
            document.getElementById('toggle_confirm_password').addEventListener('click', function() {
                var passwordInput = document.getElementById('confirm_password_input');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            });          

            // check password
            function checkpassword(){
                var check_password = document.getElementById('password_input').value;
                var check_confirm_password = document.getElementById('confirm_password_input').value;
                if (check_password.length< 8) {
                    alert ('Mật khẩu phải chứa ít nhất 8 kí tự.');
                    return false;
                }
                if (check_password != check_confirm_password){
                    alert ('Xác nhận mật khẩu không chính xác. Vui lòng nhập lại!');
                    return false;
                }
            } 
           
        </script>   -->
    </body>
</html>