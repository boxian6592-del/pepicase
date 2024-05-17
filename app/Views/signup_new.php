<!DOCTYPE html5>
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
        <link rel="stylesheet" href="/pepicase/public/css/fonts.css">
        <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300;400;900&display=swap" rel="stylesheet">

        <style>
            .row{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            .input-group{
                display: flex;
                align-items: center;
            }
            .input-group .form-control {
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
                border-right: none;
            }

            .input-group .input-group-text {
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .input-group .input-group-text img {
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <div class = "lexend-deca sales d-flex justify-content-center align-items-center" style ="height: 50px; font-size: 15px;">
            <div align = "center"><text>Free Shipping worldwide for<br>orders $30 or above</text></div>
            <div style="padding-left:165px; padding-right:165px;" align = "center"><text>ALL PHONE CASES: Limited-time<br>40% Off</text></div>
            <div align = "center"><text>30 days free replacements<br>for quality issues.</text></div>
        </div>

        <header>
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-sm-4"></div>

                    <div class="col-sm-4 d-flex justify-content-center align-items-center">
                        <a href="/pepicase/public/" class="name"><div class ="londrina-solid" style ="font-size: 30px;">pepicase</div></a>
                    </div>

                    <div class="col-sm-4 d-flex justify-content-center align-items-center">
                        <a href="/pepicase/public/" style="color:black; text-decoration:none;">
                            <img style ="height: 30px; width: auto;" src="/pepicase/public/pics/Vector (1).png'; '/pepicase/public/pics/login.svg';" alt="">
                        </a>
                        <a href="" style="margin-right: 20px; text-decoration: none; color:white;">
                            <img src="/pepicase/public/pics/Cart.png" alt="">
                        </a>
                        <a href="">
                            <img src="/pepicase/public/pics/Frame.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 bg-primary text-white">33.33%</div>
                    <div class="col-sm-4 bg-dark text-white">33.33%</div>
                    <div class="col-sm-4 bg-primary text-white">33.33%</div>
                </div>
            </div>
        </header>

                <!-- <div class="top_header">
                    <nav class="d-flex justify-content-between" >
                        <h2 class="name"><a href="/pepicase/public/" style = "color:inherit; text-decoration:none; font-family: 'Londrina Solid'">pepicase</a></h2>
                        <div class="logo_right">
                            <a href="/pepicase/public/" style="color:black; text-decoration:none;">
                                <img style ="height: 30px; width: auto;" src="/pepicase/public/pics/Vector (1).png'; '/pepicase/public/pics/login.svg';" alt="">

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
                </div> -->

        <div class="d-flex align-items-center justify-content-center">
            <form method="post" action="/pepicase/public/signup/" onsubmit="return checkpassword()">
                <h2 class="text-center" style="margin: 0px; margin-bottom: 20px; color: #1F3E97; font-family: 'Londrina Solid';"><b>SIGN UP</b></h2>

                <div class="mb-3">
                    <label for="email" class="form-label">
                        <b>Email</b>
                        <span class="form-required">*</span>
                    </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Abc123@gmail.com" oninput="check_email()" required>
                    
                    <div id="check_email">
                        <span></span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">
                        <b>Password</b>
                        <span class="form-required">*</span>
                    </label>
                    
                    <div class="input-group" id="password-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Abc12345" style="border-right: none;" oninput="check(); check_confirm_password()" required>
                        <span class="input-group-text" id="toggle_password">
                            <img style="margin: 0px;" src="/pepicase/public/pics/Ellipse.svg" alt="">
                        </span>
                    </div>

                    <div id="check_password">
                        <span style="color: #1F3E97; font-family: 'Lexend'">Mật khẩu phải tối thiểu 8 ký tự và bao gồm chữ in hoa, chữ viết thường và số</span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">
                        <b>Confirm password</b>
                        <span class="form-required">*</span>
                    </label>
                    
                    <div class="input-group" id="confirm-password-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Abc12345" style="border-right: none;" oninput="check_confirm_password()" required>
                        <span class="input-group-text" id="toggle_confirm_password">
                            <img style="margin: 0px;" src="/pepicase/public/pics/Ellipse.svg" alt="">
                        </span>
                    </div>

                    <div id="check_confirm_password">
                        <span style="color: #1F3E97; font-family: 'Lexend'"></span>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <input class="btn btn-primary" type="submit" name="signup" value="SIGN UP" onclick="checkpassword()" 
                    style = "width: 100%; margin-top: 20px; background-color: #FFE57A; border-color: black; transition: background-color 0.3s; color:black; font-family: 'Lexend'">
                </div>
                <div id="trigger_confirm_password" class="message"></div>

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

        <?php include(APPPATH.'views/components/bottom-footer.php'); ?>

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

            function check() {
                var password = document.getElementById("password").value;
                var confirm_password = document.getElementById("confirm_password").value;
                var trigger_password = document.getElementById("check_password");
                var trigger_confirm_password = document.getElementById("check_confirm_password");

                // Kiểm tra mật khẩu
                if ((password.length >= 8) && (password.match(/[0-9]/)) && (password.match(/[A-Z]/)) && (password.match(/[a-z]/))) {
                    trigger_password.style.color = "green";
                    trigger_password.style.fontFamily = "Lexend";
                    trigger_password.innerText = "Mật khẩu hợp lệ.";
                } else {
                    trigger_password.style.color = "red";
                    trigger_password.style.fontFamily = "Lexend";
                    trigger_password.innerText = "Mật khẩu không hợp lệ. Vui lòng nhập lại!";
                }
            }

            function check_confirm_password() {
                var password = document.getElementById("password").value;
                var confirm_password = document.getElementById("confirm_password").value;
                var trigger_confirm_password = document.getElementById("check_confirm_password").getElementsByTagName('span')[0];

                // Kiểm tra xác nhận mật khẩu
                if (confirm_password === password) {
                    trigger_confirm_password.style.color = "green";
                    trigger_confirm_password.style.fontFamily = "Lexend";
                    trigger_confirm_password.innerText = "Xác nhận mật khẩu hợp lệ.";
                } else {
                    trigger_confirm_password.style.color = "red";
                    trigger_confirm_password.style.fontFamily = "Lexend";
                    trigger_confirm_password.innerText = "Xác nhận mật khẩu không khớp. Vui lòng nhập lại!";
                }
            }

            // kiểm tra password và confirm password trùng khớp chưa khi nhấn submit
            function checkpassword() {
                var password = document.getElementById("password").value;
                var confirm_password = document.getElementById("confirm_password").value;
                var trigger_confirm_password = document.getElementById("trigger_confirm_password");

                if ((password.length >= 8) && (password.match(/[0-9]/)) && (password.match(/[A-Z]/)) && (password.match(/[a-z]/))) {
                    if (confirm_password === password) {
                        trigger_confirm_password.style.color = "green";
                        trigger_confirm_password.style.fontFamily = "Lexend";
                        trigger_confirm_password.innerText = "Xác nhận mật khẩu hợp lệ.";
                        return true; // Submit form
                    } else {
                        trigger_confirm_password.style.color = "red";
                        trigger_confirm_password.style.fontFamily = "Lexend";
                        trigger_confirm_password.innerText = "Xác nhận mật khẩu không khớp. Vui lòng nhập lại!";
                        return false; // Prevent form submission
                    }
                } else {
                    trigger_confirm_password.style.color = "red";
                    trigger_confirm_password.style.fontFamily = "Lexend";
                    trigger_confirm_password.innerText = "Mật khẩu không hợp lệ. Vui lòng nhập lại!";
                    return false; // Prevent form submission
                }
            }
        </script>
    </body>
</html>