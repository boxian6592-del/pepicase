<?php include(APPPATH.'views/components/top-header.php'); ?>


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
            <hr style="margin-top: 40px;">
            <div style="font-size:30px; color: #1F3E97;text-decoration-line: underline; ">Change Password</div>
            <button class="save-button" style="background-color:#ffe57a; height:50px; width:150px; border-radius:5px; border:1px solid #000000; margin-top:30px; margin-left: 120px; font-size:20px;">SAVE</button>
        </div>
    </div>
</div>

<?php include(APPPATH.'views/components/bottom-footer.php'); ?>