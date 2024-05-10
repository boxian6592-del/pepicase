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

    <?php 
        $array = [];
        $conn = mysqli_connect("LAPTOP-R604O2UQ","baodang","lmao","testing");
        if (mysqli_connect_errno()) {
            echo "". mysqli_connect_error();
            exit();
        }
        else {
            $sql = "SELECT * FROM product";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $new_row = [$row["product_id"], $row["product_name"], $row["price"], $row["pathing"]];
                    $array[] = $new_row;
                }
            } 
        }
    ?>

    <script>
        var js_arr = '<?php echo json_encode($array) ?>'
    </script>

    <body>
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

        
        <div id ="page-body" class ="container-fluid d-flex flex-column align-items-center" style = "margin: 0; padding: 0;">
            <div class = "lexend-tera container-fluid d-flex flex-column justify-content-center align-items-center" style = "height:40vh; background-color:#FFFAE3; font-size:4.5vw; font-weight: 600;">
                Purchases History
                <button class="lexend" style ="height:10vh; width:18vw; font-size:20px; background-color:inherit; border-radius:20px; margin-top: 50px;"><b>SHOP ALL</b></button>
            </div>
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
        <script src="/pepicase/purchases.js"></script>
    </body>
 
