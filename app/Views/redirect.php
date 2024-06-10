<?php include(APPPATH.'views/components/usual-links.php'); ?>
<?php include(APPPATH.'views/components/top-header.php'); ?>

    <div class = "d-flex align-items-center justify-content-center flex-column lexend" style = "height: 50vh; font-size: 25px;">

        <div class = "d-flex align-items-center justify-content-center" style = "color:black;">
            You're currently logged in as a regular user, whilst using an administrator account.
        </div>

        <div class="d-flex align-items-center justify-content-center" style="color:black;">
            Enter the admin's dashboard by&nbsp;<b>entering the secret key</b>!
        </div>

        <form method="POST" action="http://localhost/pepicase/public/redirect/check" class="d-flex flex-column align-items-center" style="margin-top: 3vh;">
            <div class="d-flex align-items-center justify-content-center flex-row">
                <div class="form-group shadow">
                    <input placeholder="Enter secret code!" type="text" name="secret" class="form-control shadow fs-4 py-3 px-4" required>
                </div>
                <button class="btn btn-dark shadow fs-4 py-3 px-4" style="margin-left: 1vw;">Submit</button>
            </div>
        </form>

        <div class="d-flex align-items-center justify-content-center" style="color:black; font-size: 20px; margin-top: 3vh;">
            <a href = "/pepicase/public/">Continue to the User's homepage</a>
        </div>

    </div>

<?php include(APPPATH.'views/components/bottom-footer.php'); ?>