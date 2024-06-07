<?php include(APPPATH.'views/components/usual-links.php'); ?>
    <link rel="stylesheet" href="/pepicase/public/css/resetpassword1.css">
<?php include(APPPATH.'views/components/top-header.php'); ?>



<div class="lexend d-flex flex-column align-items-center" style ="min-height: 60vh;">
    <div class = "wrapper">
        <h2 class="text-center" style="margin: 0px; margin-bottom: 20px; color: #1F3E97; font-family: 'Londrina Solid';"><b>RESET PASSWORD</b></h2>        <form id ="form" method="post" action="/pepicase/public/resetPassword">
            <div class="mb-3">
                <label for="infor" class="form-label"><strong>Enter your account's email:</strong></label>
                <input type="text" class="form-control" id="infor" name="email" placeholder="example@email.com" required>
            </div>
            <?php
                        if(isset($validation))
                        {
                            echo "<td style ='color: red;'>";
                            echo $validation->listErrors();
                            echo "</td>";
                        }
                        if(isset($msg))
                        {
                            echo "<td style ='color: red;'>";
                            echo "This account doesn't exist!";
                            echo "</td>";
                        }
                        if(isset($error))
                        {
                            echo "<td style ='color: red;'>";
                            echo $error;
                            echo "</td>";
                        }
            ?>
            <div class="d-grid gap-2">
                <a class="btn btn-primary" onclick="document.getElementById('form').submit()">NEXT</a>
                <a style="color: #1F3E97; font-size:14px" href="/pepicase/public/login">Go back</a>
            </div>
        </form>
    </div>
</div>


</body>
</html>