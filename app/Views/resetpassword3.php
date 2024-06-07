<?php include(APPPATH.'views/components/usual-links.php'); ?>
    <link rel="stylesheet" href="/pepicase/public/css/resetpassword3.css">
<?php include(APPPATH.'views/components/top-header(no_session).php'); ?>
<div style = "height: 60vh;">
    <div class="d-flex justify-content-center lexend">
        <div class ="form-container wrapper">
            <form method="post" id="form" action="/pepicase/public/resetPassword/confirmed/<?= $encrypted_email ?>">
                <h2 class="text-center" style="margin: 0px; margin-bottom: 20px; color: #1F3E97; font-family: 'Londrina Solid';"><b>RESET PASSWORD</b></h2>
                <hr>
                <div class="mb-3">
                    <label for="password" class="form-label"><strong>Set your new password:</strong></label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="New password" required>
                    <input type="text" class="form-control" id="password-repeat" placeholder="Repeat new password" required>
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