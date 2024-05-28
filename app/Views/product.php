<?php include(APPPATH.'views/components/usual-links.php'); ?>
    <link rel="stylesheet" href="/pepicase/public/css/product.css">
<?php include(APPPATH.'views/components/top-header.php'); ?>
        <div class = "lexend-tera d-flex justify-content-center align-items-center" style = "height:200px;background-color:#FFFAE3; font-size:40px;">
            COLLECTION BANNER (with product-testing )
        </div>
        <div class="d-flex" style ="height: 675px;">

            <div id = "image-box" class ="shadow d-flex justify-content-center align-items-center" style = "margin-left: 145px; 
            margin-top: 55px; width:495px; height:495px; background-color:#FFFAE3; border-radius: 10px;">
                <img src ="<?=$path?>" style ="height: 90%; width: auto;">
            </div>

            <div style=" margin-top:55px; margin-left:100px; height:575px; width:620px;">

            <div class="d-flex" style="height: fit-content;">
                <div id="product_name" class="lexend" style="line-height: 44px; height: 88px; width: fit-content; max-width: 500px; font-size: 36px;">
                    <?=$name?>
                </div>
                <?php if($user_id == null) echo '<a href="/pepicase/public/login">'; ?>
                <div class="ml-auto">
                    <img id="favorite" <?php if($user_id !== null) echo 'onclick="toggleFavorite()"'?> style="margin-top: 12px; width: 28.89px; height: 25.84px;" 
                    src="<?php if($user_id !== null && $favorite === 'yes') echo '/pepicase/public/pics/favorite_icon_shaded.svg'; else echo '/pepicase/public/pics/favorite_icon.svg'?>" alt="favorite">
                </div>
                <?php if($user_id == null) echo '</a>'; ?>
            </div>
                
                    <div id="pricing" class="lexend-tera" style="font-size:25px;"><?=$price?>$</div>
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
                        <?php if($user_id == null) echo '<a href="/pepicase/public/login" style ="text-decoration:none;">'?>
                        <button id="add_to_cart_button" class= "lexend d-flex align-items-center justify-content-center" style = "width: 350px; height: 50px; background-color:black; color:white; border-radius:20px;"></button>
                        <?php if($user_id == null) echo '</a>'?>
                        <div id ="quantity" class ="d-flex" style = "border: 1px solid black; width:fit-content;margin-left:10px;">
                            <button onclick="add()" id="plus" class= "lexend d-flex align-items-center justify-content-center" style = "border:none; background-color:white">+</button>
                            <div id="curr_quantity" style ="width: 50px;"class= "lexend d-flex align-items-center justify-content-center"><?= $indiv_amount ?></div>
                            <button onclick="minus()" id="minus" class= "lexend d-flex align-items-center justify-content-center" style = "border:none; background-color:white">-</button>
                        </div>
                    </div>

                    <div style="font-size:15px; color:gray;">Free standard shipping</div>
                    <div id = "combotext" class ="lexend" style="font-size:25px; font-weight:400;"></div>
            </div>
        </div>
        <div class="d-flex justify-content-center" style ="height: 500px;">
            <div class="lexend" style = "height: fit-content; width: 1187px;">
                <span style ="font-size: 25px;"><b>CUSTOMER REVIEWS</b></span> <br>
                <span style ="font-size: 18px;">Rating</span> <br><br>
                <img class = "review_star" data-value = 1 src="/pepicase/public/pics/review_star.svg" style ="height: 32px; width:30px;">
                <img class = "review_star" data-value = 2 src="/pepicase/public/pics/review_star.svg" style ="height: 32px; width:30px;">
                <img class = "review_star" data-value = 3 src="/pepicase/public/pics/review_star.svg" style ="height: 32px; width:30px;">
                <img class = "review_star" data-value = 4 src="/pepicase/public/pics/review_star.svg" style ="height: 32px; width:30px;">
                <img class = "review_star" data-value = 5 src="/pepicase/public/pics/review_star.svg" style ="height: 32px; width:30px;">

                <br><br>
                <span style ="font-size: 18px;">Your review</span> <br><br>
                <input id="review_content" type="text" placeholder="Your thoughts about this item..." style = "margin:0; width:1186px; padding-bottom:50px; padding-left: 10px; padding-top: 5px; border:1px solid grey ;border-radius: 2px;">
                <button style = "float: right; margin-top:10px; background-color:black; color:white;"><span style="font-weight:300;">Post review</span></button>
            </div>
        </div>
        <script src="/pepicase/public/js/jquery.js"></script>
        <script>
            var user = <?php if($user_id == null) echo 'null'; else echo $user_id ?>;
            var price = <?= $price ?>;
            var product_id = <?= $id ?>;
            var isFavorited = "<?= $favorite ?>";
            var product_name = "<?= $name ?>";
            var cart_amount = '<?= $cart_amount ?>';
            var quantity = <?= $indiv_amount ?>;
        </script>
        <script src="/pepicase/public/js/product.js"></script>
<?php include(APPPATH.'views/components/bottom-footer.php'); ?>