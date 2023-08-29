<?php
    include "includes/header.php";
    if(isset($_SESSION['userid'])){
        header("Location: https://www.sharehdcinema.com");
        exit();
    }
?>
<style>
    *{margin:0;padding:0;box-sizing:border-box;color:#fff}body{background:#ecf0f3;min-height:100vh;width:100%;overflow-x:hidden;font-family:'Montserrat',sans-serif}input[type=checkbox]{width:12px;height:12px;}label{visibility:hidden;}.loginus{margin-top:100px;padding:60px 35px 35px 35px !important;border-radius:40px;box-shadow:13px 13px 20px #cbced1, -13px -13px 20px #fff !important;}.logodiv{margin:0 auto;width:100px;}.logo{width:100px;height:100px;border-radius:50%;}.danger{color:red;}.ctnsuccess{color:green;}.fields{padding:75px 5px 5px 5px;}.form-group input:focus{outline:none;border:none;background:transparent;box-shadow:13px 13px 20px #cbced1, -13px -13px 20px #fff !important;}.form-group input{outline:none;border:none;background:none;color:#000;margin-bottom:30px;box-shadow:inset 8px 8px 8px #cbced1,inset -8px -8px 8px #fff;border-radius:25px;}label{color:#000;}.loginbtn{display:block;width:100%;border-radius:20px;box-shadow:13px 13px 20px #cbced1, -13px -13px 20px #fff !important;}
</style>
<?php
    include "includes/navbar.php";
?>

<div class="container row mx-auto my-auto">
<form action="includes/login.php" class="loginus col-md-6 mx-auto" method="POST">
    <?php
    $userinfo = '';
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "nouser") {
                echo "<p class = 'danger text-center'>Username/Email Invalid</p>";
            }elseif ($_GET["error"] == "emailinvalid") {
                echo "<p class = 'danger text-center'>Email Invalid</p>";
            }
            elseif ($_GET["error"] == "wrongpassword") {
                $userinfo = $_GET['user'];
                echo "<p class = 'danger text-center'>Password Invalid</p>";
            }
         }
        if (isset($_GET["login"])) {
           if ($_GET["login"] == "success") {
               echo "<p class = 'ctnsuccess text-center'>Login Successful</p>";
           }
        }
        if (isset($_GET["newpwd"])) {
           if ($_GET["newpwd"] == "updated") {
               echo "<p class = 'ctnsuccess text-center'>Password Updated</p>";
           }
        }
    ?>
    <div class="logodiv">
           <a href="https://www.sharehdcinema.com"><img class="logo" src="https://www.sharehdcinema.com/icons/logo.png"></a>
            <!--<div style="color:#f00;font-weight:bold;">Sharehdcinema</div>-->
        </div>
    <div class="fields">
        <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="loginuid" required placeholder="Enter Username/Email" value="<?php echo $userinfo?>">
        </div>
        <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="myInput" class="form-control" name="password" required placeholder="Enter Password">
        </div>
        <br>
        <input type="checkbox" class="d-inline-block" onclick="myFunction()">&nbsp;&nbsp;<span style="font-size:14px;color:#000;" >Show Password</span>
        <br><br>
        <button type="submit" class="btn btn-outline-dark loginbtn" name="loginbtn">Login<div class="text-center d-none spins spinner-grow" style="color:#000;width: 2rem;height: 2rem;" role="status">
			    <span class="text-center visually-hidden">Loading...</span>
			</div></button>
			<br><br>
			<a href="reset-password"style="color:#2f2fA2;text-decoration:underline;">Forgot password ??</a><br>
			<br>
			<a href="register"style="color:#2f2fA2;text-decoration:underline;">Don't have an account?</a>
	</div>		
    </form>
</div>
<script type="text/javascript">
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
const navbtn = document.querySelector('.navbarul button')
const nav = document.querySelector('.navbar-light')
navbtn.addEventListener('click', () => {
    if(!nav.classList.contains('sticky')){
        nav.classList.toggle('sticky');   
    }
})
if(screen.width > 768){
    navbtn.parentElement.style.display = "none";
}
$(document).ready(function(){
    $('.loginus button').click((e) => {
        $('.loginus input.form-control').each(function(){
            if (($(this).val() !== '') && ($(this).siblings('input').val() !== '')) {
                $('.loginus button').css({"opacity":"0.55"})
                $('.loginus button').css({"background":"transparent"})
                $('.spins').removeClass('d-none');
                $('.spins').addClass('d-inline-block');
                $('.loginus button').contents().filter(function() {
                return this.nodeType===3;
            }).remove();
                
            }
        })
    })
})
</script>   
<script async type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>