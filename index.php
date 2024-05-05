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

    </head>
    <body>
        <?php
        $id1; $id2; $id3;
        $conn = mysqli_connect("LAPTOP-R604O2UQ","baodang","lmao","testing");
        if (mysqli_connect_errno()) {
            echo "". mysqli_connect_error();
            exit();
        }

        ?>
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
                        <ul id="main_menu" >
                            <li><a href="">New & Featured</a></li>

                            <li>
                                <a href="/pepicase/product/product.php">Products</a>
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

                            <li><a href="/pepicase/about_us/about-us.php">About Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        
        
        

        <img class = "banner" src="/pepicase/pics/pompurin_banner.svg" alt="banner" style = "width: 100%; height:auto;">

        <div class="lexend-deca" style = "font-size: 40px; font-weight; margin-left: 150px; margin-top:50px;"><b>OUR LATEST ARRIVALS</b></div>
        <div class = "lexend d-flex justify-content-center align-items-center" style = "height:525px;">

            <div class="d-flex flex-column" style ="width: 300px; height: 463px">
                <div class= "d-flex align-items-center justify-content-center" style ="width: 300px; height: 340px; background-color:#FFF3C0; border-radius:10px;">
                      <img src="/pepicase/product-pics/testing.svg" style = "width: 149px; height: 300px;">
                </div>
                <div align="center" style ="font-size:20px; font-weight: 200;">
                    Pompompurin_Pudding iPhone <br> Case [111111]
                </div>
                <div align="center" style ="font-size:20px; font-weight: 200; color:#ACA7A7;">
                    DESIGN FROM MOONGULAND
                </div>
                <div align="center" style ="font-size:25px; font-weight: 300;">
                    $9.99 USD
                </div>
            </div>

            <div class="d-flex flex-column" style ="width: 300px; height: 463px; margin-left:135px; margin-right:135px;">
                <div class= "d-flex align-items-center justify-content-center" style ="width: 300px; height: 340px; background-color:#FFF3C0; border-radius:10px;">
                      <img src="/pepicase/product-pics/testing.svg" style = "width: 149px; height: 300px;">
                </div>
                <div align="center" style ="font-size:20px; font-weight: 200;">
                    Pompompurin_Pudding iPhone <br> Case [111111]
                </div>
                <div align="center" style ="font-size:20px; font-weight: 200; color:#ACA7A7;">
                    DESIGN FROM MOONGULAND
                </div>
                <div align="center" style ="font-size:25px; font-weight: 300;">
                    $9.99 USD
                </div>
            </div>

            <div class="d-flex flex-column" style ="width: 300px; height: 463px">
                <div class= "d-flex align-items-center justify-content-center" style ="width: 300px; height: 340px; background-color:#FFF3C0; border-radius:10px;">
                      <img src="/pepicase/product-pics/testing.svg" style = "width: 149px; height: 300px;">
                </div>
                <div align="center" style ="font-size:20px; font-weight: 200;">
                    Pompompurin_Pudding iPhone <br> Case [111111]
                </div>
                <div align="center" style ="font-size:20px; font-weight: 200; color:#ACA7A7;">
                    DESIGN FROM MOONGULAND
                </div>
                <div align="center" style ="font-size:25px; font-weight: 300;">
                    $9.99 USD
                </div>
            </div>

        </div>

        <div class="d-flex align-items-center justify-content-center lexend" style = "margin-bottom:50px;">
            <button style ="width: 150px; height: 50px; border-radius:20px; color:white; background-color:black;">VIEW ALL</button>
        </div>

        

        <div class = "lexend-deca d-flex justify-content-center" style ="height: 300px; font-size: 20px; background-color:#FEF3D8">
                <div class= "d-flex flex-column align-items-center" style="width: fit-content; height: fit-content; margin-top: 75px;">
                    <div>
                        <img src = "/pepicase/pics/shipping_icon.svg" style ="height:68.75px; width:100px;">
                    </div>
                    <div style = "padding-bottom:10px;">
                        <span><b>Fast shipping</b></span>
                    </div>
                    <div align="center">
                        <span>Consistently delivers shipments <br> punctually with tracking.</span>
                    </div>
                </div>

                <div class= "d-flex flex-column align-items-center" style="width: fit-content; height: fit-content; margin-top: 75px; margin-left: 100px; margin-right:100px;">
                    <div>
                        <img src = "/pepicase/pics/reply_icon.svg" style ="height:68.75px; width:100px;">
                    </div>
                    <div style = "padding-bottom:10px;">
                        <span><b>Swift replies</b></span>
                    </div>
                    <div align="center">
                        <span>Is usually quick to reply.</span>
                    </div>
                </div>

                <div class= "d-flex flex-column align-items-center" style="width: fit-content; height: fit-content; margin-top: 75px;">
                    <div>
                        <img src = "/pepicase/pics/discount_icon.svg" style ="height:68.75px; width:100px;">
                    </div>
                    <div style = "padding-bottom:10px;">
                        <span><b>Exclusive member discount</b></span>
                    </div>
                    <div align="center">
                        <span>Take advantage of special offers, <br> just for you.</span>
                    </div>
                </div>
            </div>



            <div class="lexend-deca" style = "font-size: 40px; font-weight; margin-left: 150px; margin-top:50px;"><b>OUR COLLECTIONS</b></div>
        <div class = "lexend d-flex justify-content-center align-items-center" style = "height:525px;">

            <div class="d-flex flex-column" style ="width: 300px; margin-top:150px;">
                <div class= "d-flex align-items-center justify-content-center" style ="width: 300px; height: 340px; background-color:#CFE0FC; border-radius:10px;">
                      <img src="/pepicase/product-pics/testing.svg" style = "width: 149px; height: 300px;">
                </div>
                <div align="center" style ="font-size:25px; font-weight: 300;">
                    <b>Cinamonroll</b>
                </div>
            </div>

            <div class="d-flex flex-column" style ="width: 300px; margin-left:135px; margin-right:135px;">
                <div class= "d-flex align-items-center justify-content-center" style ="width: 300px; height: 340px; background-color:#FFF3C0; border-radius:10px;">
                      <img src="/pepicase/product-pics/testing.svg" style = "width: 149px; height: 300px;">
                </div>
                <div align="center" style ="font-size:25px; font-weight: 300;">
                    <strong>Pompompurin</strong><br>
                    (NEWLY ARRIVED)
                </div>
            </div>

            <div class="d-flex flex-column" style ="width: 300px; margin-top:150px;">
                <div class= "d-flex align-items-center justify-content-center" style ="width: 300px; height: 340px; background-color:#FACAD3; border-radius:10px;">
                      <img src="/pepicase/product-pics/testing.svg" style = "width: 149px; height: 300px;">
                </div>
                <div align="center" style ="font-size:25px; font-weight: 300;">
                    <b>My Melody</b>
                </div>
            </div>

        </div>

        <div class="d-flex align-items-center justify-content-center lexend" style = "margin-bottom:50px;">
            <button style ="width: 150px; height: 50px; border-radius:20px; color:white; background-color:black;">VIEW ALL</button>
        </div>


    <footer class="footer">
        <div class = "main-content">
            <p class="title">Address</p>
            <div class="footer-a">
                <a href=""><img src="/pepicase/pics/location.svg" alt="location-icon"></a><br>
                <a href=""><img src="/pepicase/pics/sms.svg" alt="sms-icon"></a><br>
                <a href=""><img src="/pepicase/pics/call.svg" alt="call-icon"></a>
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
        <script src = "/pepicase/general.js"></script>
    </body>
</html>
    <!--Đã có đính Boostrap cho CSS ở trên!
        Bootstrap dạng JS thì bỏ code này vào trong header hoặc trước </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>-->
