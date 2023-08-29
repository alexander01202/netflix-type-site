<?php
    include "includes/header.php";
    include "includes/navbar.php";
?>
<div id="wrapper"></div>

<div class="container contactus row mx-auto my-auto">
<form  action="includes/forgotpwd" class="loginus col-md-6 mx-auto" method="POST"><?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "nouser") {
            echo "<p class = 'ctnsuccess text-center'>Pls<a href='register' style='color:#f00'>Register</a> properly</p>";
        }
    }if (isset($_GET["success"]) || isset($_GET['error'])) {
        if ($_GET["success"] == "resetsuccess") {
            echo "<p class = 'text-success text-center'>Check Your E-mail!! <h6 class='text-danger m-0' style='opacity:0.8;'>*If not seen,check spam folder!!!</h6></p>";
        }elseif ($_GET["error"] == "tryagain") {
            echo "<p class='text-center' style='color:#f00;'>Please try again!!</p>";
        }
    }?>
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" required placeholder="Enter Your Email">
    <button class="btn btn-outline-dark" style="width:90%" name="forgotpwd">Reset Password</button>
</form>
</div>
<?php include 'includes/footer.php';