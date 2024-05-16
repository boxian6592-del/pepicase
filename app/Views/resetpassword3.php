<?php include(APPPATH.'views/components/usual-links.php'); ?>
    <link rel="stylesheet" href="/pepicase/public/css/resetpassword3.css">
<?php include(APPPATH.'views/components/top-header.php'); ?>
        
        <div class="d-flex align-items-center justify-content-center">
    <form action="">
        <h2 class="text-center">Reset Password</h2>
        <hr>
        <div class="mb-3">
            <label for="password" class="form-label">Set your password</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="d-grid gap-2">
            <a href="/pepicase/index.php" class="btn btn-primary">NEXT</a>
            <a href="/pepicase/login.php">Cancel</a>
        </div>
    </form>
</div>

<?php include(APPPATH.'views/components/bottom-footer.php'); ?>