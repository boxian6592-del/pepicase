<?php 
    use App\Models\CustomSession;
    $curr_session = new CustomSession(null);
    $curr_session->fetch_session_cookie();

    if (!$curr_session->isSessionSet())
    {
        $id = "lmao";
    }
    else $id = "no";
    ?>
    
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
                                <img src="/pepicase/public/pics/Vector (1).png" alt="">
                                Welcome, <?php if($id !== null) echo 'User!'; else echo 'Guest!';?>
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
        