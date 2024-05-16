<?php include(APPPATH.'views/components/top-header.php'); ?>
        
<div class="d-flex align-items-center justify-content-center">
    <form action="">
        <h2 class="text-center">Change Password</h2>
        <hr>
        <div class="mb-3">
            <label for="infor" class="form-label">New Password</label>
            <input type="text" class="form-control" id="infor" name="infor" placeholder="Xyz456@">
            <label for="infor" class="form-label">Confirm password</label>
            <input type="text" class="form-control" id="infor" name="infor" placeholder="Xyz456@">
        </div>
        <div class="">
            <a href="/pepicase/index.php" class="btn btn-primary">CONFIRM</a>
        </div>
    </form>
</div>


<?php include(APPPATH.'views/components/bottom-footer.php'); ?>
