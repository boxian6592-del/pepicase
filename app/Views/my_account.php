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
                        <h2 class="name"><a href="/pepicase/public/" style = "color:inherit; text-decoration:none;">pepicase</a></h2>
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
                        <ul id="main_menu" >
                            <li><a href="">New & Featured</a></li>

                            <li>
                                <a href="/pepicase/public/product">Products</a>
                                <span class="icon" style="color: blue; cursor: pointer;">></span>
                                <ul class="sub_menu">
                                    <li class="lexend"><a href="">Menu 2.1</a></li>
                                    <li><a href="">Menu 2.2</a></li>
                                    <li><a href="">Menu 2.3</a></li>
                                    <li><a href="">Menu 2.4</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="">Collections</a>
                                <span class="icon" style="color: blue; cursor: pointer;">></span>
                                <ul class="sub_menu">
                                    <li><a href="">Menu 3.1</a></li>
                                    <li><a href="">Menu 3.2</a></li>
                                    <li><a href="">Menu 3.3</a></li>
                                    <li><a href="">Menu 3.4</a></li>
                                </ul>
                            </li>

                            <li><a href="/pepicase/public">About Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

<div class="container">
    <div class="row" style="font-family:Lexend; line-height:auto; margin-left: 150px;">
        <div class="col">
            <div style="font-size:30px;">Credentials</div>
            <p style="font-size:20px; margin-top:20px ;">Manage and protect your account</p>
            <hr/>
            <form style="font-size:20px; margin-left: 120px;">
            <div class="row" style="margin-bottom: 20px">
                <div class="col">
                    <label>First name</label>
                    <input id="firstname" class="form-control" type="text" placeholder="Abc" style="font-size:20px; width: 300px; height: 50px; "/>
                </div>
                <div class="col">
                    <label for="lastname">Last name</label>
                    <input id="lastname" class="form-control" type="text" placeholder="Abc"  style="font-size:20px; width: 300px; height: 50px;" />
                </div>
            </div>
                <div class="form-group" style="margin-bottom: 20px">
                    <label>Username</label>
                    <input id="username" class="form-control" type="text" placeholder="Abc123" style="font-size:20px; width: 820px; height: 50px;"/>
                </div>
                <div class="form-group" style="margin-bottom: 20px">
                    <label>Email</label>
                    <input id="email" class="form-control" type="email" placeholder="Xyz456@.***" style="font-size:20px; width: 820px; height: 50px;"/>
                </div>
                <div class="form-group" style="margin-bottom: 20px">
                    <label for="phone">Phone number</label>
                    <input id="phone" class="form-control" type="tel" placeholder="0xxxxxxxxx" style="font-size:20px; width: 820px; height: 50px;"/>
                </div>
                <div class="form-group">
            <div>
                <label style ="margin-right: 80px; margin-bottom: 20px">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div> 
        </div>


    <div class="form-group row" >
        <label class="col-sm-2 col-form-label">Date of birth</label>
        <div class="col-sm-6">
            <div class="row" >
                <div class="col">
                    <select class="form-control" id="day" style="font-size:20px; height: 50px;">
                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <select class="form-control" id="month" style="font-size:20px; height: 50px;">
                        <?php 
                        // Mảng chứa tên các tháng
                        $months = array(
                            1 => "January", 
                            2 => "February", 
                            3 => "March", 
                            4 => "April", 
                            5 => "May", 
                            6 => "June", 
                            7 => "July", 
                            8 => "August", 
                            9 => "September", 
                            10 => "October", 
                            11 => "November", 
                            12 => "December"
                        );
                        ?>
                        <?php foreach ($months as $key => $month) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $month; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <select class="form-control" id="year" style="font-size:20px; height: 50px;">
                        <?php 
                            $current_year = date('Y');
                            for ($i = $current_year; $i >= 1900; $i--) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
                <div class="form-group" style="margin-top: 20px">
                    <label>My Address</label>
                    <input id="address" class="form-control" type="text" placeholder="City, District, Ward" style="font-size:20px; width: 820px; height: 50px; " />
                </div>
            </form>
            <hr/ style="margin-top: 40px;">
            <div style="font-size:30px; color: #1F3E97;text-decoration-line: underline; ">Change Password</div>
            <button class="save-button" style="background-color:#ffe57a; height:50px; width:150px; border-radius:5px; border:1px solid #000000; margin-top:30px; margin-left: 120px; font-size:20px;">SAVE</button>
        </div>
    </div>
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
        <script src = "/pepicase/public/js/my_account.js"></script>
    </body>
</html>