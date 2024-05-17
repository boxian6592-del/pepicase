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
                            <a href="/pepicase/public/<?php if($id !== null) echo 'testing'; else echo 'login';?>" style="color:black; text-decoration:none;">
                                <img style ="height: 30px; width: auto;" src="<?php if($id !== null) echo '/pepicase/public/pics/Vector (1).png'; else echo '/pepicase/public/pics/login.svg';?>" alt="">
                                <?php if($id !== null) echo 'User!'; else echo 'Guest!';?>

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
    </body>
</html>