<?php include(APPPATH.'views/components/usual-links.php'); ?>
    <link rel="stylesheet" href="/pepicase/public/css/signup_new.css">
<?php include(APPPATH.'views/components/top-header.php'); ?>

        <div class="d-flex align-items-center justify-content-center">
            <form method="post" action="">
                <h2 class="text-center" style="margin: 0px; margin-bottom: 20px; color: #1F3E97; font-family: 'Londrina Solid';"><b>SIGN UP</b></h2>

                <div class="mb-3">
                    <label for="email" class="form-label"><b>Email</b></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Abc123@gmail.com" oninput="check_email()">
                    
                    <div id="check_email">
                        <span></span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label"><b>Password</b></label>
                    
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Abc12345" style="border-right: none;" oninput="check()">
                        <span style="background: white; cursor: pointer; border-left: none;" class="input-group-text">
                            <img style="margin: 0px;" id="toggle_password" src="/pepicase/public/pics/Ellipse.svg" alt="">
                        </span>
                    </div>

                    <div id="check_password">
                        <span style="color: red;">Mật khẩu phải bao gồm chữ in hoa, chữ viết thường và số</span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label"><b>Confirm password</b></label>
                    
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Abc12345" style="border-right: none;" oninput="check_confirm_password()">
                        <span style="background: white; cursor: pointer; border-left: none;" class="input-group-text">
                            <img style="margin: 0px;" id="toggle_confirm_password" src="/pepicase/public/pics/Ellipse.svg" alt="">
                        </span>
                    </div>

                    <div id="check_confirm_password">
                        <span></span>
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

            // ràng buộc email đúng định dạng
            function check_email() {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);

                var emailAddress = "example@example.com"; // Thay đổi địa chỉ email tại đây
                if (isValidEmail(emailAddress)) {
                    console.log("Địa chỉ email hợp lệ.");
                } else {
                    console.log("Địa chỉ email không hợp lệ.");
                }

            }


            // ràng buộc password có chữ in hoa, chữ thường, số
            function check() {
                var password = document.getElementById("password").value;
                var confirm_password = document.getElementById("confirm_password").value;
                var trigger_password = document.getElementById("check_password");
                var trigger_confirm_password = document.getElementById("check_confirm_password");

                // Kiểm tra mật khẩu
if ((password.length >= 8) && (password.match(/[0-9]/)) && (password.match(/[A-Z]/)) && (password.match(/[a-z]/))) {
                    trigger_password.style.color = "green";
                    trigger_password.innerText = "Mật khẩu hợp lệ.";
                } else {
                    trigger_password.style.color = "red";
                    trigger_password.innerText = "Mật khẩu không chính xác. Vui lòng nhập lại!";
                }

                /* Kiểm tra xác nhận mật khẩu
                if (confirm_password === password) {
                    trigger_confirm_password.style.color = "green";
                    trigger_confirm_password.innerText = "Xác nhận mật khẩu hợp lệ.";
                } else {
                    trigger_confirm_password.style.color = "red";
                    trigger_confirm_password.innerText = "Xác nhận mật khẩu không khớp. Vui lòng nhập lại!";
                } */
            }
        </script>
    </body>
</html>