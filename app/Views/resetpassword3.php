<?php include(APPPATH.'views/components/usual-links.php'); ?>
    <link rel="stylesheet" href="/pepicase/public/css/resetpassword3.css">
<?php include(APPPATH.'views/components/top-header(no_session).php'); ?>
<div style = "height: 60vh;">
    <div class="d-flex justify-content-center lexend">
        <div class ="form-container wrapper">
            <form method="post" id="form" action="/pepicase/public/resetPassword/confirmed/<?= $encrypted_email ?>">
                <h2 class="text-center" style="margin: 0px; margin-bottom: 20px; color: #1F3E97; font-family: 'Londrina Solid';"><b>RESET PASSWORD</b></h2>
                <div class="mb-3">
                    <label for="password" class="form-label"><strong>Set your new password:</strong></label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="New password" required>

                    <div id="check_password" style ="margin-bottom: 20px;">
                        <span style="color: #1F3E97; font-family: 'Lexend'">Minimum 8 characters, including capitalzed letters and numbers.</span>
                    </div>

                    <input type="text" class="form-control" id="password-repeat" placeholder="Repeat new password" required>
                    <div id="check_confirm_password">
                        <span style="color: #1F3E97; font-family: 'Lexend'"></span>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <a class="btn btn-primary" onclick="document.getElementById('form').submit()"><strong>RESET</strong></a>
                    <a style="color: #1F3E97; font-size:14px" href="/pepicase/login.php">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>