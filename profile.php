<?php 
    include 'includes/header.php';
    include 'includes/navbar.php';
?>
<style>
body{margin: 0;padding: 0;box-sizing: border-box;color: #fff;}.subscribe{  position: relative;  margin-top:150px;  margin-left: -25px;} .changeuser{border-radius: 60px;background: #c4c4c4;}label{color: #262626;}.single-price{width: 100%;height:80%;  margin: 3rem;  text-align: center;  transition: 0.3s;  background: #da4357;  box-shadow: 0 0 15px #fff;  transform: scale(1.1); z-index: 1;}.single-price:hover a button{ background: #262626;border:none;}label a button{position: relative;    overflow: hidden;}.single-price:hover a button:hover{color: #da4357;    transform: scale(1.1);transition: 0.4s;}.single-price a{text-decoration: none;background: #262626;display:inline-block;margin: 10px auto;}.single-price a button{padding: 10px 60px;color: #c4c4c4;}label a button::before{content: "";position: absolute;left: 0;width: 100%;background: #fff;z-index: -1;transition: 0.8s;top: 0;border-radius: 0 0 50% 50%;height: 0%;}label a button:hover::before{height: 180%;}@media screen and (min-width: 968px){.material-icons{font-size: 38px;margin-right: 12px;}}@media screen and (max-width: 760px){.subscribe{margin: auto;}}@media screen and (max-width: 500px){.m-5{margin: 1rem !important;} .subscribe{margin-top: 160px;}h3{font-size: 20px;}h6{font-size: 13px;}}.price{width:150px;height:150px;border-radius: 50%;border: 2px solid #fff;margin: 5% auto 0 auto;text-align: center;}.deals h4{color: #262626;font-size: 14px;font-weight: normal;text-align: center;line-height: 1;}.deals h4 b{color: #262626;}.single-price h1{    font-size: 18px;color: #fff;}.price h2{font-size: 40px;color: #262626;line-height: 2.5;}table{width: 100%;background: #fff;}table tr th{width: 25%;border: 1px solid #c4c4c4;color: #262626;padding: 10px 6px;opacity: 0.7;
}table{
    margin: auto;
    width: 90% !important;
    background: #fff;
    box-shadow: 0 0 15px #fff;
  }
  table tr{
      background: #da4357;
      transition:0.3s ease-in;
      cursor: pointer;
  }
  table .next_tr:hover{
      transform:scale(1.01);
      box-shadow: 2px 2px 12px rgba(0,0,0,1);
  }
table tr th{
    text-align:center;   
    width: 50%;
    border: 1px solid #c4c4c4;
    color: #262626;
    padding: 10px 6px;
    opacity: 0.7;
  }
  table tr td{
      font-size:14px;
      overflow-x:scroll;
    text-align:center; 
    background: #e9ecef;
    padding: 5px 6px;
    opacity: 0.7;
    color: #262626;
  }
  table{
    table-layout: fixed;
  }
 @media screen and (max-width: 768px){
     .withdrawals{
         width:25%;
     }
 }
 @media screen and (max-width: 580px){
     .withdrawals{
         width:35%;
     }
 }
</style>
<div class="row">
    <div class="subscribe col-12 col-sm-12 col-md-8">
        <form class="m-5 p-5 changeuser" action="includes/useredit" method="post" enctype="multipart/form-data"><?php
            if(isset($_GET['error'])){
                if($_GET['error'] === "usernametaken"){
                    echo '<h3 class="text-danger text-center">Username Taken</h3>';
                }
                elseif($_GET['error'] === "emailtaken"){
                    echo '<h3 class="text-danger text-center">Email Taken</h3>';
                }elseif($_GET['error'] === "emailinvalid"){
                    echo '<h3 class="text-danger text-center">Email Invalid</h3>';
                }elseif($_GET['error'] === "notsamepassword"){
                    echo '<h3 class="text-danger text-center">Password Not the same</h3>';
                }elseif($_GET['error'] === "cancelsubfailed"){
                    echo '<h3 class="text-danger text-center">Can\'t find user, Please contact Admin!!</h3>';
                }
            }
            if(isset($_GET['update'])){
                if($_GET['update'] === "success"){
                    echo '<h3 class="text-success text-center">Profile updated</h3>';
                }elseif($_GET['update'] === "failed"){
                    echo '<h3 class="text-center text-danger">User not Available</h3>';
                }
            }
             if(isset($_GET['cancelsub'])){
                if($_GET['cancelsub'] === "success"){
                    echo '<h3 class="text-success text-center">Subscription Cancelled!!</h3>';
                }
            }
            ?>
        <div class="bg-dark py-3">
         <h3 class="text-center">ONLY EDIT FIELDS NEEDED</h3>
         <h6 class="text-center" style="opacity:0.5;">(leave empty/unchanged if not needed)*</h6>
         </div>
            <label for="nameedit" class="mt-2">Username:</label>
            <input class="form-control" type="text" name="nameedit" placeholder="Enter new username if needed" minlength="5" value="<?php echo $_SESSION['username']?>">
            <label for="emailedit" class="mt-2">Email:</label>
            <input class="form-control" minlength="6" type="email" name="emailedit" placeholder="Enter new email if needed" value="<?php echo $_SESSION['email']?>">
            <label for="editpassword" class="mt-2">New Password:</label>
            <input class="form-control myInput" type="password" name="editpassword" placeholder="Change password if needed">
            <label for="rptpassword" class="mt-2">Repeat New password:</label>
            <input class="form-control mb-2 myInput" name="rptpassword" type="password" placeholder="Repeat new password">
            <input type="checkbox" class="d-inline-block" onclick=" myFunction()"><span class="ms-2" style="color:#000;">Show Password</span><br>
            <label for="useredit" class="mt-2">Profile Image</label>
            <input class="form-control" type="file" name="editpfp">
            <h6 style="color:#262626;opacity:0.7;" class="py-1 mt-1">(profile image must not be changed, only by choice)*</h6>
            <br>
            <button type="submit" class="btn btn-outline-dark" name="btnedit">Save Changes</button>
            <br><br>
        </form>    
        <div>
            
        </div>
    </div>
    <div id="subscription" class="subscribe col-12 col-sm-6 col-md-4">
    <div class="single-price py-5 mx-3 mt-3">
    <?php
        if ($_SESSION['productid'] <= 0) {
            echo'<h5>No Subscription Active</h5>';
        }else{
         $sql = "SELECT * FROM profile WHERE userid='".$_SESSION['userid']."';";
         $querysql = mysqli_query($conn, $sql);
         if(mysqli_num_rows($querysql) > 0){
         $rows = mysqli_fetch_assoc($querysql);   
    ?>
    <form action="includes/cancelsub" method="post">
    <h6>Your current subscription</h6>
      <h1 class="mt-4 text-uppercase lh-2 info"><?php echo $rows['recurring']?></h1>
      <div class="price">
          <h2 class="my-4">₦<?php echo $rows['amount']?></h2>
      </div>
      <div class="deals my-5">
          <h4 class="my-3"><?php echo $rows['access']?></h4>
          <h4 class="my-3"><?php echo $rows['support']?></h4>
          <h4 class="my-3"><?php echo $rows['priority']?></h4>
          <h4 class="my-3"><?php echo $rows['streaming']?></h4>
      </div>
      <label for="cancelsub"><a class="text-uppercase fw-bold"><button type="submit" class="btn" name="cancelsub">Cancel Subscription</button></a></label>
      </form>
      <?php 
         }else{
             echo'<h5>No Subscription Active</h5>';
         }
      }?>
      </div>

  </div>
</div><br><br>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
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
</script>  
<?php
}else {
    header("Location: success?error=pagenotfound");
    exit();
}