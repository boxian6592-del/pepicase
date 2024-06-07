<?php include(APPPATH.'views/components/usual-links.php'); ?>
<?php include(APPPATH.'views/components/top-header.php'); ?>

<style>
    /* body */
        :root{
            --text-color: #1F3E97;
                --font-input: 'Lexend';
            }
            .form-label{
                margin: 0;
                color: var(--text-color);
                font-family: var(--font-input);
                padding-right: 500px;
            }

            .form-required{
                font-family: var(--font-input);
                color: red;
            }

            .input-group-text {
                position: absolute;
                right: 10px; /* Đặt vị trí của con mắt sang phải */
                cursor: pointer;
                top:55%;
                transform: translateY(-50%);
                background-color: transparent; /* Để phần màu nền của con mắt trong suốt */
                border: 10px; /* Xóa viền của con mắt */
                border-bottom-right-radius: 10px;
                border-top-right-radius: 10px;
            }
            .form-group {
                margin-bottom: 7px;
            }
            .form-group label{
                margin-bottom:10px;
            }
            /* Facebook + Google */
            .button {
                display: inline-flex;
                border:1px solid black;
                padding: 5px 20px;
                background-color: white;
                text-decoration: none;
                border-radius: 20px;
                font-family: var(--font-input);
            }
            /* check account */
            #check_account{
                font-family: var(--font-input);
                margin-top: 30px;
            }

</style>

        <div class="d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center shadow" style = "padding: 2vw; width: 50vw; border-radius: 20px; border: 1px solid #ccc">
                <form method="post" action="/pepicase/public/signup">
                    <h2 class="text-center" style="margin: 0px; margin-bottom: 20px; color: #1F3E97; font-family: 'Londrina Solid';"><b>SIGN UP</b></h2>

                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <b>Email</b>
                            <span class="form-required">*</span>
                        </label>
                        <div id="email-group">
                            <input style="width: 100%" class="form-control" type="email" id="email" name="email" placeholder="Abc123@gmail.com" onfocus="checkEmail()" onblur="checkEmail()">
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
                            <input style="width: 100%" type="password" class="form-control" id="password" name="password" placeholder="Abc12345" onfocus="check()" onblur="check(); check_confirm_password()">
                            <span class="input-group-text" id="toggle_password">
                                <img style="margin: 0px;" src="/pepicase/public/pics/Ellipse.svg" alt="">
                            </span>
                        </div>

                        <div id="check_password">
                            <span style="color: #1F3E97; font-family: 'Lexend'">Minimum 8 characters, including capitalzed letters and numbers.</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">
                            <b>Confirm password</b>
                            <span class="form-required">*</span>
                        </label>
                        
                        <div id="confirm-password-group" class="input-group">
                            <input style="width: 100%" type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Abc12345" onfocus="check_confirm_password()" onblur="check_confirm_password()">
                            <span class="input-group-text" id="toggle_confirm_password">
                                <img style="margin: 0px;" src="/pepicase/public/pics/Ellipse.svg" alt="">
                            </span>
                        </div>

                        <div id="check_confirm_password">
                            <span style="color: #1F3E97; font-family: 'Lexend'"></span>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <input class="btn btn-primary form-control" type="submit" name="signup" value="SIGN UP" 
                        style = "width: 100%; margin-top: 10px; background-color: #FFE57A; border-color: black; transition: background-color 0.3s; color:black; font-weight:bold; font-family: 'Lexend'">
                    </div>
                    <div id="trigger_confirm_password" class="message"></div>

                    <div class="d-flex justify-content-center" style="margin-top: 10px; margin-bottom: 10px">
                        <hr class="before" style="width: 100%">
                        <text style="padding: 5px; font-family: 'Lexend'">OR</text>
                        <hr class="last" style="width: 100%">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button id = "facebook-button"type="button" class="button">
                            <img style="width: 24px; height: 24px; margin-right: 5px" src="/pepicase/public/pics/Facebook_icon.svg" alt="facebook">
                        Facebook</button>                   

                        <button id ="google-button" class="button" style="text-decoration: none;">
                            <img style="width: 26px; height: 26px; margin-right: 5px" src="/pepicase/public/pics/Google_Icons-09-512.webp" alt="google">
                        Google</button>
                    </div>

                    <div class="d-flex justify-content-center" id="check_account">
                        <div style="color: #A7A7A7; margin-right: 8px">Have an account? <a style="color: #844700;" href="/pepicase/public/login">Login</a></div>
                    </div>
                </form>
            </div>
        </div>
        <div style ="height: 5vh;"></div>
    <script src = "/pepicase/public/js/signup.js"></script>
    <script>
        var url = '<?= $fb_btn ?>';
        var url2 = '<?= $googleButton ?>';

        document.getElementById('facebook-button').addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = url;
        })

        document.getElementById('google-button').addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = url2;
        })

    </script>
</body>
</html>