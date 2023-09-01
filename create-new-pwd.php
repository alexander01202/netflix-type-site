<?php
    include "includes/header.php";
?>

<div id="wrapper"></div>

<div class="container contactus row mx-auto my-auto">
<?php 
    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    if (empty($selector) || empty($validator)) {
        header("location: https://sharehdcinema.com/login");
        exit();
    }else {
        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) { ?>
            <form  action="https://sharehdcinema.com/includes/reset-pwd-inc" class="loginus col-md-6 mx-auto" method="POST"><?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "pwdnotsame") {
                        echo "<p class = 'ctnsuccess text-center'>Password Not Same</p>";
                    }
                }?>
                <input type="hidden" name="selector" value="<?php echo $selector?>">
                <input type="hidden" name="validator" value="<?php echo $validator?>">
                <label for="pwd">Password:</label>
                <input type="password" class="myInput form-control" name="pwd" required placeholder="Enter password"><br/>
                <label for="repeatpwd">Repeat Password:</label>
                <input type="password" class="myInput form-control" name="repeatpwd" required placeholder="Repeat new password">
                 <br>
                <input type="checkbox" onclick="myFunction()">&nbsp;&nbsp;<span>Show Password</span>
                <br>
                <button class="btn btn-outline-dark" type="submit" name="reset-pwdsubmit">Reset Password</button>
            </form>
       <?php };
    }
?>
</div>
<?php include 'includes/footer.php';?>
<script type="text/javascript">
  function myFunction() {
  var a = document.querySelectorAll(".myInput").forEach(x => {
       if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }     
    });
}
</script>