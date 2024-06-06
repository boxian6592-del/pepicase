<?php include(APPPATH.'views/components/usual-links.php'); 
use App\Models\CustomSession;?>
<link rel="stylesheet" href="/pepicase/public/css/login.css">
<?php include(APPPATH.'views/components/top-header.php'); ?>

<?php 
    $curr_session = new CustomSession();
?>

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
                    <input type="text" class="form-control" id="email" name="email" placeholder="Abc123@gmail.com"required>
                    <div id="emailError" style="color: red; display: none;">Please enter a valid email address.</div>                   
                </div>
                <div class="form-group">
                    <label for="password" style="color:#1F3E97;"><b>Password</b></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Abc123" required>
                    <span class="input-group-text" id="toggle_password">
                            <img style="margin: 0px;" src="/pepicase/public/pics/Ellipse.svg" alt="">
                    </span>
                </div>
                <div class="text-center">
                    <input class="btn btn-primary form-control" type="submit" name="signup" value="SIGN UP" 
                        style = "width: 100%; margin-top: 10px; background-color: #FFE57A; border-color: black; transition: background-color 0.3s; color:black; font-weight:bold; font-family: 'Lexend'">
                </div>  
                <div class="text-center" style = "color:red">
                    <strong><?php if(isset($msg)) echo $msg; else if(isset($validation)) echo $validation;?></strong>

                </div>
                <div class="d-flex align-items-center mt-3">
                    <hr class="flex-grow-1">
                    <span style="padding: 5px;">OR</span>
                    <hr class="flex-grow-1">
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
                <div class="d-flex justify-content-between mt-3">
                    <a style="color: #1F3E97; font-size:14px" href="/pepicase/public/resetPassword">Forgot your password?</a>
                    <a style="color: #1F3E97; font-size:14px" href="/pepicase/public/signup">Create an account</a>
                </div>
            </form>
        </div>
    </div>

    <script>
    var url = 'lmao';
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
