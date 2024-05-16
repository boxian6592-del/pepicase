<?php include(APPPATH.'views/components/usual-links.php'); ?>
    <link rel="stylesheet" href="/pepicase/public/css/resetpassword1.css">
<?php include(APPPATH.'views/components/top-header.php'); ?>
        
<div class="lexend d-flex align-items-center justify-content-center">
    <form action="">
        <h2 class="text-center">Reset Password</h2>
        <hr>
        <div class="mb-3">
            <label for="infor" class="form-label">Phone number / Email</label>
            <input type="text" class="form-control" id="infor" name="infor" placeholder="0xxxxxxxxx/ ******@**" required>
        </div>
        <div class="d-grid gap-2">
            <a href="/pepicase/resetpassword2.php" class="btn btn-primary">NEXT</a>
            <a href="/pepicase/public/login" style ="color:black;">Go back</a>
        </div>
    </form>
</div>


<?php include(APPPATH.'views/components/bottom-footer.php'); ?>