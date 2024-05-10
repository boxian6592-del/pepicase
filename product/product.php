<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>pepicase</title>
        <link rel="stylesheet" href="/pepicase/header-footer.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&family=Lexend:wght@100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Tera:wght@100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/pepicase/fonts.css">
        <link rel="stylesheet" href="/pepicase/product/product.css">
    </head>
    <?php

        $name = "";
        $id = "";
        $path = "";
        $price = 0;
        $conn = mysqli_connect("LAPTOP-R604O2UQ","baodang","lmao","testing");
        if (mysqli_connect_errno()) {
            echo "". mysqli_connect_error();
            exit();
        }
        else
        {
            $sql = "SELECT * FROM product WHERE (product_id = '00001')";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
            }
            $name = $row["product_name"];
            $id = $row["product_id"];
            $price = $row["price"];
            $path = $row["pathing"];
        }
    ?>
    
    <script>
        var img_pathing = "<?php echo $path ?>";
        var case_name = "<?php echo $name ?>";
        var price = "<?php echo $price ?>"
    </script>

    <body>
        <div class = "lexend-deca sales d-flex justify-content-center align-items-center" style ="height: 50px; font-size: 15px;">
            <div align = "center"><text>Free Shipping worldwide for<br>orders $30 or above</text></div>
            <div style="padding-left:165px; padding-right:165px;" align = "center"><text>ALL PHONE CASES: Limited-time<br>40% Off</text></div>
            <div align = "center"><text>30 days free replacements<br>for quality issues.</text></div>

        </div>
        <header>
            <div class="header">
                <div class="top_header">
                    <nav class="d-flex justify-content-between">
                        <a href="" id="search">
                            <img src="/pepicase/pics/Search.png" alt="">
                        </a>
                        <h2 class="name"><a href="/pepicase/index.php" style = "color:inherit; text-decoration:none;">pepicase</a></h2>
                        <div class="logo_right">
                            <a href="" style="margin-right:20px; text-decoration: none; color:white;">
                                <img src="/pepicase/pics/Vector (1).png" alt="">
                            </a>
                            <a href="" style="margin-right: 20px; text-decoration: none; color:white;">
                                <img src="/pepicase/pics/Cart.png" alt="">
                            </a>
                            <a href="">
                                <img src="/pepicase/pics/Frame.png" alt="">
                            </a>
                        </div>
                    </nav>
                </div>
                <div class="bottom_header">
                    <nav class="container">
                        <ul id="main_menu">
                            <li><a href="">New & Featured</a></li>

                            <li>
                                <a href="">Products</a>
                                <span class="icon" style="color: blue; cursor: pointer;">></span>
                                <ul class="sub_menu">
                                    <li><a href="">Menu 2.1</a></li>
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

                            <li><a href="/pepicase/about_us/about-us.php">About Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>


        <div class = "lexend-tera d-flex justify-content-center align-items-center" style = "height:200px;background-color:#FFFAE3; font-size:40px;">
            COLLECTION BANNER (with product-testing )
        </div>
        <div class="d-flex" style ="height: 675px;">

            <div id = "image-box" class ="shadow d-flex justify-content-center align-items-center" style = "margin-left: 145px; margin-top: 55px; width:495px; 
            height:495px; background-color:#FFFAE3; border-radius: 10px;"></div>

            <div style=" margin-top:55px; margin-left:125px; height:575px; width:650px;">

                <div class="d-flex" style="height:fit-content;">
                    <div id ="product_name" class="lexend" style = "line-height:44px; height:88px; width:fit-content;max-width:550px; font-size: 36px;"></div>
                    <img id="favorite" onclick ="favorite()" style="margin-top:12px;margin-left:10px;width: 28.89px;height:25.84px;" src="/pepicase/pics/favorite_icon.svg" alt="favorite">
                </div>
                
                    <div id="pricing" class="lexend-tera" style="font-size:25px;"></div>
                    <div style="font-size:18px; color:gray;">Model</div>

                    <div>
                        <button class = "sizing">iPhone 11</button>
                        <button class = "sizing">iPhone 11 Pro</button>
                        <button class = "sizing">iPhone 11 Pro Max</button>
                        <button class = "sizing">iPhone XR</button>
                    </div>

                    <div>
                        <button class = "sizing">iPhone 12</button>
                        <button class = "sizing">iPhone 12 Pro</button>
                        <button class = "sizing">iPhone 12 Pro Max</button>
                        <button class = "sizing">iPhone 12 Mini</button>
                    </div>

                    <div>
                        <button class = "sizing">iPhone 13</button>
                        <button class = "sizing">iPhone 13 Pro</button>
                        <button class = "sizing">iPhone 13 Pro Max</button>
                        <button class = "sizing">iPhone 13 Mini</button>
                    </div>

                    <div>
                        <button class = "sizing">iPhone 14</button>
                        <button class = "sizing">iPhone 14 Pro</button>
                        <button class = "sizing">iPhone 14 Pro Max</button>
                        <button class = "sizing">iPhone 14 Plus</button>
                    </div>

                    <div>
                        <button class = "sizing">iPhone 15</button>
                        <button class = "sizing">iPhone 15 Pro</button>
                        <button class = "sizing">iPhone 15 Pro Max</button>
                        <button class = "sizing">iPhone 15 Plus</button>
                    </div>

                    <div class="d-flex">
                        <button id="add_to_cart_button" class= "lexend d-flex align-items-center justify-content-center" style = "width: 350px; height: 50px; background-color:black; color:white; border-radius:20px;"></button>
                        <div id ="quantity" class ="d-flex" style = "border: 1px solid black; width:fit-content;margin-left:10px;">
                            <button onclick="add()" id="plus" class= "lexend d-flex align-items-center justify-content-center" style = "border:none; background-color:white">+</button>
                            <div id="curr_quantity" style ="width: 50px;"class= "lexend d-flex align-items-center justify-content-center"></div>
                            <button onclick="minus()" id="minus" class= "lexend d-flex align-items-center justify-content-center" style = "border:none; background-color:white">-</button>
                        </div>
                    </div>

                    <div style="font-size:15px; color:gray;">Free standard shipping</div>
            </div>
        </div>
        <div class="d-flex justify-content-center" style ="height: 500px;">
            <div class="lexend" style = "height: fit-content; width: 1187px;">
                <span style ="font-size: 25px;"><b>CUSTOMER REVIEWS</b></span> <br>
                <span style ="font-size: 18px;">Rating</span> <br><br>
                <img class = "review_star" data-value = 1 src="/pepicase/pics/review_star.svg" style ="height: 32px; width:30px;">
                <img class = "review_star" data-value = 2 src="/pepicase/pics/review_star.svg" style ="height: 32px; width:30px;">
                <img class = "review_star" data-value = 3 src="/pepicase/pics/review_star.svg" style ="height: 32px; width:30px;">
                <img class = "review_star" data-value = 4 src="/pepicase/pics/review_star.svg" style ="height: 32px; width:30px;">
                <img class = "review_star" data-value = 5 src="/pepicase/pics/review_star.svg" style ="height: 32px; width:30px;">

                <br><br>
                <span style ="font-size: 18px;">Your review</span> <br><br>
                <input id="review_content" type="text" placeholder="Your thoughts about this item..." style = "margin:0; width:1186px; padding-bottom:50px; padding-left: 10px; padding-top: 5px; border:1px solid grey ;border-radius: 2px;">
                <button style = "float: right; margin-top:10px; background-color:black; color:white;"><span style="font-weight:300;">Post review</span></button>
            </div>
        </div>



















    <footer class="footer">
        <div class = "main-content">
            <div class = "rows">
                <div class = "column">
                    <p class="title">Policy</p>
                    <div class="footer-links">
                        <a href="">Trading conditions</a><br>
                        <a href="">Protect user information</a><br>
                        <a href="">Secure customer transactions</a><br>
                        <a href="">Product warranty policy</a><br>
                        <a href="">Payment policies and regulations</a>
                    </div>
                </div>
                <div class = "column">
                    <p class="title">Customer Support</p>
                    <div class="footer-links">
                        <a href="">Shopping guide</a><br>
                        <a href="">Electronic bill</a><br>
                        <a href="">Shipping and delivery</a><br>
                        <a href="">Payment methods</a><br>
                        <a href="">Look up orders</a>
                    </div> 
                </div>
                <div class = "column">
                    <p class="title">Address</p>
                    <div class="footer-a">
                        <a href=""><img src="/pepicase/pics/location.svg" alt="location-icon"></a><br>
                        <a href=""><img src="/pepicase/pics/sms.svg" alt="sms-icon"></a><br>
                        <a href=""><img src="/pepicase/pics/call.svg" alt="call-icon"></a>
                    </div>
                </div>
            </div>
        </div>

            <div class ="icons d-flex justify-content-center align-items-center" style = "height: 250px; padding-bottom: 30px;">
                <a href=""><img src="/pepicase/pics/Facebook Icon.png" class = "img-rounded" alt="facebook-icon" style ="margin-right: 40px;"></a>
                <a href=""><img src="/pepicase/pics/Group 1.png" class = "img-rounded" alt="facebook-icon"></a>
                <a href=""><img src="/pepicase/pics/x.png" class = "img-rounded" alt="facebook-icon" style ="margin-left: 40px;"></a>
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
        <script src = "/pepicase/product/product.js"></script>
    </body>
</html>
    <!--Đã có đính Boostrap cho CSS ở trên!
        Bootstrap dạng JS thì bỏ code này vào trong header hoặc trước </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>-->
