<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>pepicase</title>
        <link rel="stylesheet" href="/pepicase/public/css/header-footer.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&family=Lexend:wght@100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Tera:wght@100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/pepicase/public/css/fonts.css">
        <link rel="stylesheet" href="/pepicase/public/css/login.css">
        <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300;400;900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class = "lexend-deca sales d-flex justify-content-center align-items-center" style ="height: 50px; font-size: 15px;">
            <div align = "center"><text>Free Shipping worldwide for<br>orders $30 or above</text></div>
            <div style="padding-left:165px; padding-right:165px;" align = "center"><text>ALL PHONE CASES: Limited-time<br>40% Off</text></div>
            <div align = "center"><text>30 days free replacements<br>for quality issues.</text></div>
        </div>

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
        
        <div class="lexend d-flex align-items-center justify-content-center" style ="height: 50vh;">
            <form action="">
                <h2 class="text-center">LOGIN</h2>
                <table>
                    <tr>
                        <td>
                            <p>Phone number/Email</p>
                            <input style="margin-right:50px;" type ="text" name ="infor" placeholder="09xxxxxxxx / Abc123@gmail.com" required>
                        </td>
                        <td>
                            <p>Password</p>
                            <input type ="text" name ="Password" placeholder="Abc123" required>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <button class="login-button">LOGIN</button>
                        </td>
                    </tr>
                    <?php
                    if($status == "invalid")
                    {
                        echo "<td>";
                        if($validation->hasError('email')) {
                            echo $validation->getError('email');
                        }
                        if ($validation->hasError('password')) {
                            echo $validation->getError('password');
                        }
                        echo "</td>";
                    }
                    if($status == null)
                    {
                        echo "<td>";
                        echo "Incorrect email or password!";
                        echo "</td>";
                    }
                    ?>
                    <tr >
                        <td>
                            <a style=" color: #1F3E97" href="/pepicase/public/resetPassword">Forgot your password?</a>
                        </td>
                        <td style="text-align:right;">
                            <a style="color: #1F3E97" href="/pepicase/public/signup">Create an account</a>
                        </td>
                    </tr>
                </table>

                <div class="d-flex">
                    <hr class="before">
                    <text style="padding: 5px;">OR</text>
                    <hr class="last">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="https://www.facebook.com/login">
                        <button type="button" class="button">
                            <img src="/pepicase/public/pics/Facebook_icon.svg" alt="Your Image">Facebook</button>
                    </a>
                    <a href="https://www.facebook.com/login">
                        <button type="button" class="button">
                            <img src="/pepicase/public/pics/Google_Icons-09-512.webp" alt="Your Image">Google</button>
                    </a> 
                </div>
            </form>
        </div>


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
    </body>
    <script>
        document.getElementsByClassName("login-button")[0].addEventListener("click", function(event)
        {
            event.preventDefault();
            var email = document.getElementsByName("infor")[0].value;
            var pass = document.getElementsByName("Password")[0].value;
            alert(email);
            alert(pass);
        })
    </script>
</html>