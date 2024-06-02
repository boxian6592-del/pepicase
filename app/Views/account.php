<?php include(APPPATH.'views/components/usual-links.php'); ?>
<?php include(APPPATH.'views/components/top-header.php'); ?>

<div style="background-color: #FFFAE3; height: 200px; display: flex; align-items: center; justify-content: center;">
    <b style="font-size: 40px; font-family: 'Lexend Tera';">My Account</b>
</div>

<div class="flex-container" style="display: flex; margin-top: 50px;">
    <div style="margin-left: 150px; width: 20%">
        <div style="margin-bottom: 40px;">
            <b style="font-size: 50px; font-family: 'Lexend';">Account</b>
            <div class="flex-container" style="margin-top: 15px;">
                <a style ="text-decoration:none;" href="">
                    <img src="/pepicase/public/pics/user.svg" alt="">
                </a>
                <a href="/pepicase/public/logout" style="color: #838383; margin-left: 6px; font-size: 20px; font-family: 'Lexend';">Log out</a>
            </div>
        </div>

        <div>
            <b style="font-size: 50px; font-family: 'Lexend';">Order History</b>
            <div class="flex-container" style="color: #838383; font-size: 20px; font-family: 'Lexend';margin-top: 15px;">
                <text style="margin-top: 15px;">View history</text><a href="/pepicase/public/purchases" style="color: #838383; font-size: 20px; margin-left: 6px; font-family: 'Lexend';">here</a>
            </div>
        </div>
    </div>

    <div style="width: 50%">
        <div>
            <b style="font-size: 40px;">Account details</b>
            <p style="font-size:20px; margin-top:10px; color: #838383; font-family: 'Lexend';">Manage and protect your account</p>
        </div>
        <hr style="color: #838383">
        <form action="" style="font-family: 'Lexend';">

            <div class="form-group row" style="margin-bottom: 20px;">
                <div class="col" style="margin-right: 170px">
                    <label><b style="font-family: 'Lexend';">First name</b></label>
                    <input id="firstname" class="form-control" type="text" placeholder="Abc" style="font-size:20px; width: 300px;" required/>
                </div>

                <div class="col">
                    <label for="lastname"><b style="font-family: 'Lexend';">Last name</b></label>
                    <input id="lastname" class="form-control" type="text" placeholder="Abc" style="font-size:20px; width: 300px;" required/>
                </div>

                <div class="form-group" style="margin-bottom: 20px">
                    <label for="phone"><b style="font-family: 'Lexend';">Phone number</b></label>
                    <input id="phone" class="form-control" type="tel" placeholder="0xxxxxxxxx" style="font-size:20px; width: 820px;" required/>
                </div>
                
                <div class="form-group" style="margin-top: 20px">
                    <label><b style="font-family: 'Lexend';">My Address</b></label>
                    <input id="address" class="form-control" type="text" placeholder="City, District, Ward" style="font-size:20px; width: 820px;" required/>
                </div>

                <div class="form-group" style="margin-top:30px;">
                    <button class="save-button" style="background-color: black; width: 50%; height: 40px; color: white; border-radius: 15px; font-size:20px;">Save Changes</button>
                </div>

            </div>
        </form>

        <hr style="margin-top: 40px; color: #838383">
        <div class="form-group"><a href="" style="font-size: 20px; color: #838383; text-decoration-line: underline; font-family: 'Lexend';">Change your password</a></div>
    </div>
</div>
<?php include(APPPATH.'views/components/bottom-footer.php'); ?>