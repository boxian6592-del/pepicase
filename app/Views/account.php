<?php include(APPPATH.'views/components/usual-links.php'); ?>
<?php include(APPPATH.'views/components/top-header.php'); ?>

<div style="background-color: #FFFAE3; height: 200px; margin-top: 20px; display: flex; align-items: center; justify-content: center;">
            <b style="font-size: 40px; font-family: 'Lexend Tera';">My Account</b>
        </div>
        
        <div class="flex-container" style="display: flex; margin-top: 50px;">
            <div style="margin-left: 150px; width: 35%">
                <div style="margin-bottom: 40px;">
                    <b style="font-size: 50px; font-family: 'Lexend';">Account</b>
                    <div class="flex-container">
                        <a style ="text-decoration:none;" href="">
                            <img src="/pepicase/public/pics/user.svg" alt="">
                        </a>
                        <a href="" style="color: #838383; margin-left: 10px; font-size: 20px; font-family: 'Lexend';">Log out</a>
                    </div>
                </div>

                <div>
                    <div style="font-size: 50px; font-family: 'Lexend';"><b>Order History</b></div>
                    <div style="color: #838383; font-size: 20px; font-family: 'Lexend';">
                        View history <a href="#" style="color: #838383; font-size: 20px; font-family: 'Lexend';">here</a>
                    </div>
                </div>
            </div>

            <div style="width: 50%">
                <div>
                    <b style="font-size: 40px;">Account details</b>
                    <p style="font-size:20px; margin-top:10px; color: #838383;">Manage and protect your account</p>
                </div>
                <hr style="color: #838383">
                <form action="" style="font-family: 'Lexend';">

                    <div class="form-group row" style="margin-bottom: 20px;">
                        <div class="col" style="margin-right: 170px">
                            <label><b>First name</b></label>
                            <input id="firstname" class="form-control" type="text" placeholder="Abc" style="font-size:20px; width: 300px; height: 50px; "/>
                        </div>

                        <div class="col">
                            <label for="lastname"><b>Last name</b></label>
                            <input id="lastname" class="form-control" type="text" placeholder="Abc" style="font-size:20px; width: 300px; height: 50px;" />
                        </div>

                        <div class="form-group" style="margin-bottom: 20px">
                            <label><b>Email</b></label>
                            <input id="email" class="form-control" type="email" placeholder="Xyz456@.***" style="font-size:20px; width: 820px; height: 50px;"/>
                        </div>

                        <div class="form-group" style="margin-bottom: 20px">
                            <label for="phone"><b>Phone number</b></label>
                            <input id="phone" class="form-control" type="tel" placeholder="0xxxxxxxxx" style="font-size:20px; width: 820px; height: 50px;"/>
                        </div>

                        <div class="form-group">
                            <div>
                                <label style ="margin-right: 80px; margin-bottom: 20px"><b>Gender</b></label>
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
                            <label class="col-sm-2 col-form-label"><b>Date of birth</b></label>
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

                        <div class="form-group" style="margin-top: 20px">
                            <label><b>Date of birth</b></label>
                            <input id="address" class="form-control" type="text" placeholder="City, District, Ward" style="font-size:20px; width: 820px; height: 50px; " />
                        </div>

                        <div class="form-group" style="margin-top:30px;">
                            <button class="save-button" style="background-color: black; width: 50%; height: 40px; color: white; border-radius: 5px; font-size:20px;">Save Changes</button>
                        </div>

                    </div>
                </form>

                <hr style="margin-top: 40px; color: #838383">
                <div  class="form-group" style="font-size: 20px; color: #838383; text-decoration-line: underline;">Change your password</div>
            </div>
        </div>
        <?php include(APPPATH.'views/components/bottom-footer.php'); ?>