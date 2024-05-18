<?php include(APPPATH.'views/components/usual-links.php'); ?>
    <link rel="stylesheet" href="/pepicase/public/css/signup_new.css">
<?php include(APPPATH.'views/components/top-header(no_session).php'); ?>

        <div class="d-flex align-items-center justify-content-center">
            <form method="post" action="/pepicase/public/signup">
                <h2 class="text-center" style="margin: 0px; margin-bottom: 20px; color: #1F3E97; font-family: 'Londrina Solid';"><b>SIGN UP</b></h2>

                <div class="mb-3">
                    <label for="email" class="form-label">
                        <b>Email</b>
                        <span class="form-required">*</span>
                    </label>
                    <div id="email-group">
                        <input style="width: 100%" class="form-control-lg" type="email" id="email" name="email" placeholder="Abc123@gmail.com" onfocus="checkEmail()" onblur="checkEmail()" required>
                    </div>

                    <div id="check_email">
                        <span></span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">
                        <b>Password</b>
                        <span class="form-required">*</span>
                    </label>
                    
                    <div id="password-group" class="input-group">
                        <input style="width: 100%" type="password" class="form-control-lg" id="password" name="password" placeholder="Abc12345" onfocus="check()" onblur="check(); check_confirm_password()" required>
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
                    
                    <div id="confirm-password-group" class="input-group">
                        <input style="width: 100%" type="password" class="form-control-lg" id="confirm_password" name="confirm_password" placeholder="Abc12345" onfocus="check_confirm_password()" onblur="check_confirm_password()" required>
                        <span class="input-group-text" id="toggle_confirm_password">
                            <img style="margin: 0px;" src="/pepicase/public/pics/Ellipse.svg" alt="">
                        </span>
                    </div>

                    <div id="check_confirm_password">
                        <span style="color: #1F3E97; font-family: 'Lexend'"></span>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <input class="btn btn-primary form-control-lg" type="submit" name="signup" value="SIGN UP" 
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

                    <a href="https://accounts.google.com/o/oauth2/v2/auth/oauthchooseaccount?client_id=398874333579-u9rrotjv4vu07ut6l3844d6mspcadqds.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fauth.w3spaces.com%2Foauth2%2Fidpresponse&scope=profile%20email%20openid&response_type=code&state=H4sIAAAAAAAAAE1R25KiMBD9lzwbBwgI-OaAgzJe0UFla8sKkBAQCNdBndp_3_iwVfvU3XUufar7B2AwBX0LCW47KF97xzw4Z_0UgxEIBeJwnuREDJEYYjlp6iKXSMH0b97dQinpmqaUBBwLmHVd1U7f3qqG0zQn4wG1EeM8b8cRLwSHCE7E45cb_d86AdNfgFekTF9b8fDiJ2Xa8XGbilqO-5Y0YxwXaQl-jwATWk8_Mq3jyuZQmCq2nr4u2e7zvqoMxBt6XgufVNCKpcI2wTudG7ZWXyT2CN3rx0V3a8S2kO2svoKWWiyyvR0JRSYUB0WbiPYm2udQbfG3r7uLkC0fhxnNZ6twRQnM8MELjPqIlrN1Vl-9pjjB8uxX_I4TR7PO6jJw7hiV1b7w_XPWfZYDtD891IVZAINrdAp2i2Gr6naW50esOZu5U89sxf2az8PtGnme2n-5O5nQ3cRNFNXUPvKL6nFTekg-ld_3lHchTzfL28ZaN2RuDReROBeJcd-x19UrHJF_Ry_AVNbliYRM2VBGoAJTivOWjEDz-oaMkBFSDKUQRVDVTQkasmlCTTMVE-lKHFEZ_PkL7gX8JSQCAAA.H4sIAAAAAAAAAAEgAN__y0vkfMF2IMR5hy_E3GPrpPO0kKOzVAaUsUBLfK0Xt29zeXyZIAAAAA.4&access_type=offline&service=lso&o2v=2&ddm=0&flowName=GeneralOAuthFlow">
                        <button class="button" style="text-decoration: none;">
                            <img style="width: 26px; height: 26px; margin-right: 5px" src="/pepicase/public/pics/Google_Icons-09-512.webp" alt="google">
                        Google</button>
                    </a> 
                </div>

                <div class="d-flex justify-content-center" id="check_account">
                    <p style="color: #A7A7A7; margin-right: 8px">Have an account?</p>
                    <a style="color: #844700;" href="/pepicase/public/login">Login</a>
                </div>
            </form>
        </div>
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
                var trigger_password = document.getElementById("check_password").querySelector('span');
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
            function handlePass() {
                var checkpassword = document.getElementById('check_password').querySelector('span');
                checkpassword.innerText = ''; // Xóa thông báo khi phần tử nhận được focus
            }
            document.getElementById('password').addEventListener('blur', check);
            document.getElementById('password').addEventListener('focus', handlePass);

            // Kiểm tra xác nhận mật khẩu
            function check_confirm_password() {
                var password = document.getElementById("password").value;
                var confirm_password = document.getElementById("confirm_password").value;
                var trigger_confirm_password = document.getElementById("check_confirm_password").querySelector('span');

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
            function handleConfirm() {
                var checkconfirmpassword = document.getElementById('check_confirm_password').querySelector('span');
                checkconfirmpassword.innerText = ''; // Xóa thông báo khi phần tử nhận được focus
            }
            document.getElementById('confirm_password').addEventListener('blur', check_confirm_password);
            document.getElementById('confirm_password').addEventListener('focus', handleConfirm);

            // kiểm tra form khi nhấn submit
            function checkForm(event) 
            {
                event.preventDefault();
                var emailValid = checkEmail();
                var passwordValid = check();
                var confirmPasswordValid = check_confirm_password();

                if (emailValid && passwordValid && confirmPasswordValid) {
                    // All validation checks pass, submit the form
                    document.getElementById("myForm").submit();
                    return true;
                } else {
                    // Validation failed, prevent form submission
                    return false;
                }
            }
        </script>
        <?php include(APPPATH.'views/components/bottom-footer.php'); ?>