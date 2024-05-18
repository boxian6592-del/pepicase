<?php include(APPPATH.'views/components/usual-links.php'); ?>
<?php include(APPPATH.'views/components/top-header.php'); ?>

        <div class="d-flex align-items-center justify-content-center">
            <form method="post" action="/pepicase/public/signup/" onsubmit="return checkForm()">
                <h2 class="text-center" style="margin: 0px; margin-bottom: 20px; color: #1F3E97; font-family: 'Londrina Solid';"><b>SIGN UP</b></h2>

                <div class="mb-3">
                    <label for="email" class="form-label">
                        <b>Email</b>
                        <span class="form-required">*</span>
                    </label>
                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Abc123@gmail.com" onfocus="checkEmail()" onblur="checkEmail()" required>
                    
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
                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Abc12345" style="border-right: none;" oninput="check(); check_confirm_password()" required>
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
                        <input type="password" class="form-control form-control-lg" id="confirm_password" name="confirm_password" placeholder="Abc12345" style="border-right: none;" oninput="check_confirm_password()" required>
                        <span class="input-group-text" id="toggle_confirm_password">
                            <img style="margin: 0px;" src="/pepicase/public/pics/Ellipse.svg" alt="">
                        </span>
                    </div>

                    <div id="check_confirm_password">
                        <span style="color: #1F3E97; font-family: 'Lexend'"></span>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <input class="btn btn-primary form-control-lg" type="submit" name="signup" value="SIGN UP" onclick="checkpassword()" 
                    style = "width: 100%; margin-top: 20px; background-color: #FFE57A; border-color: black; transition: background-color 0.3s; color:black; font-weight:bold; font-family: 'Lexend'">
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

            // kiểm tra email
            function checkEmail() {
                var email = document.getElementById('email').value;
                var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                var checkEmailDiv = document.getElementById('check_email').querySelector('span');

                if (emailPattern.test(email) && emailPattern !== '') {
                    checkEmailDiv.innerText = 'Email hợp lệ';
                    checkEmailDiv.style.color = 'green';
                    checkEmailDiv.style.fontFamily = "Lexend";
                    return true;
                } else {
                    checkEmailDiv.innerText = 'Email không hợp lệ. Vui lòng nhập lại';
                    checkEmailDiv.style.color = 'red';
                    checkEmailDiv.style.fontFamily = "Lexend";
                    return false;
                }
            }
            function handleFocus() {
                var checkEmailDiv = document.getElementById('check_email').querySelector('span');
                checkEmailDiv.innerHTML = ''; // Xóa thông báo khi phần tử nhận được focus
            }

            document.getElementById('email').addEventListener('blur', checkEmail);
            document.getElementById('email').addEventListener('focus', handleFocus);

            // Kiểm tra mật khẩu
            function check() {
                var password = document.getElementById("password").value;
                var confirm_password = document.getElementById("confirm_password").value;
                var trigger_password = document.getElementById("check_password");
                var trigger_confirm_password = document.getElementById("check_confirm_password");

                if ((password.length >= 8) && (password.match(/[0-9]/)) && (password.match(/[A-Z]/)) && (password.match(/[a-z]/)) && password !== '') {
                    trigger_password.style.color = "green";
                    trigger_password.style.fontFamily = "Lexend";
                    trigger_password.innerText = "Mật khẩu hợp lệ.";
                    return true;
                } else {
                    trigger_password.style.color = "red";
                    trigger_password.style.fontFamily = "Lexend";
                    trigger_password.innerText = "Mật khẩu không hợp lệ. Vui lòng nhập lại!";
                    return false;
                }
            }

            // Kiểm tra xác nhận mật khẩu
            function check_confirm_password() {
                var password = document.getElementById("password").value;
                var confirm_password = document.getElementById("confirm_password").value;
                var trigger_confirm_password = document.getElementById("check_confirm_password").getElementsByTagName('span')[0];

                if (confirm_password === password && password !== '') {
                    trigger_confirm_password.style.color = "green";
                    trigger_confirm_password.style.fontFamily = "Lexend";
                    trigger_confirm_password.innerText = "Xác nhận mật khẩu hợp lệ.";
                    return true;
                } else {
                    trigger_confirm_password.style.color = "red";
                    trigger_confirm_password.style.fontFamily = "Lexend";
                    trigger_confirm_password.innerText = "Xác nhận mật khẩu không hợp lệ.";
                    return false;
                }
            }

            function checkForm() {
                var emailValid = checkEmail();
                var passwordValid = check();
                var confirmPasswordValid = check_confirm_password();
                return emailValid && passwordValid && confirmPasswordValid;
            }
        </script>
    </body>
</html>