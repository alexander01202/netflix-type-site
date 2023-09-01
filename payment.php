<?php
session_start();
if (!isset($_SESSION['userid']) || empty($_SESSION['userid']) || !isset($_POST['btnpay'])) {
  header("Location: register.php?error=pleaseregisterfirst");
  exit();
}elseif (isset($_POST['btnpay']) && isset($_SESSION['userid'])) {
  $amount = $_POST['movie'];
  $access = $_POST['access'];
  $support = $_POST['support'];
  $streaming = $_POST['streaming'];
  $priority = $_POST['priority'];
  $watch = $_GET['watch'];
  $recurring = $_POST['recurring'];
  $currency = "NGN";
include 'includes/header.php'; 
include 'includes/navbar.php';
?>
<style>
*{
    color:#fff;
}
  body{
    backdrop-filter: blur(8px);
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background:#ecf0f3;
  }
  /*.row,footer{*/
  /*  background: rgba(0, 0, 0, 0.2);*/
  /*}*/
  footer{
    margin-top: 0px !important;
  }
  .subscribe{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top:150px;
  }
  #payment-form{
    padding:60px 35px 35px 35px !important;border-radius:40px;box-shadow:13px 13px 20px #cbced1, -13px -13px 20px #fff !important;
  }
  #payment-form label{
    color: #262626;
    margin: 10px 0px 10px;
  }
  #payment-form input{
    opacity: 0.7;
  }
  #payment-form table{
    width: 100%;
    background: #696969;
    box-shadow:13px 13px 20px #cbced1, -13px -13px 20px #fff !important;
  }
  #payment-form table tr th{
    width: 50%;
    border: 1px solid #c4c4c4;
    color: #fff;
    padding: 10px 6px;
    opacity: 0.7;
  }
  #payment-form table tr td{
    background: #e9ecef;
    padding: 5px 6px;
    opacity: 0.7;
    color: #101010;
  }
  table{
    table-layout: fixed;
  }
.single-price{
  width: 100%;
  height:80%;
  text-align: center;
  transition: 0.3s;
  background: #da4357;
  box-shadow: 0 0 15px #fff;
  transform: scale(1.1);
  z-index: 1;
}
@media screen and (min-width: 968px){
    .material-icons{
    font-size: 38px;
    margin-right: 12px;
    }
}
@media screen and (max-width: 768px){
  #payment-form{
    margin: 0px -15px 0px 10px;
  }
  .single-price{
      margin: auto;
      height: unset;
      width: 70%;
    }
    .subscribe{
      margin: auto;
      margin-top: 150px;
    }
}
@media screen and (max-width: 530px){
    #payment-form{
      padding: 50px 30px;
    }
}
.price{
  width:150px;
  height:150px;
  border-radius: 50%;
  border: 2px solid #fff;
  margin: 5% auto 0 auto;
  text-align: center;
}
.deals h4{
color: #262626;
font-size: 14px;
font-weight: normal;
text-align: center;
line-height: 1;
}
.deals h4 b{
color: #262626;
}
.single-price h1{
    font-size: 18px;
    color: #fff;
}
.price h2{
    font-size: 40px;
    color: #262626;
    line-height: 2.5;
}
.btn{
    box-shadow:13px 13px 20px #cbced1, -13px -13px 20px #fff !important;
}
</style>
<div class="row" style="width:100%; height:100%;">
<div class="subscribe col-12 col-md-8">
<form id="payment-form" method="post" action="includes/paystack.php">
    <span style="color:#101010;">To edit fields, click on <a href="https://www.yournetflixwebsite.com/profile" class="text-uppercase" style="color:#f00;text-decoration:underline;">profile</a></span><br>
    <label for="email">Email:</label>
    <input type="email"class="form-control" name="payEmail" readonly placeholder="Enter Email" value="<?php echo $_SESSION['email']?>">
    <label for="username">Username:</label>
    <input type="text" class="form-control" name="payuid" readonly placeholder="Enter Username" value="<?php echo $_SESSION['username']?>">
    <!--<label for="mobile">Mobile Number:</label>-->
    <!--<input type="number" class="form-control" name="mobile" required placeholder="Enter Mobile Number">-->
    <table class="mt-3">
    <tr>
      <th>Product</th>
      <th>Subscription</th>
      <th>Amount</th>
    </tr>
    <tr style="height: 60px">
    <td class="text-uppercase"><?php echo $watch?></td>
      <td class="text-uppercase"><?php echo $recurring?></td>
      <td class="text-uppercase"><label for="amount">&nbsp;₦<?php echo $amount?></label></td>
    </tr>
    </table>
    <br>
  <div>
    <input type="hidden"  name="amount" value="<?php echo $amount?>">  
    <input type="hidden"  name="recurring" value="<?php echo $recurring?>"> 
    <input type="hidden" name="streaming" value="<?php echo $streaming?>"> 
    <input type="hidden"  name="support" value="<?php echo $support?>"> 
    <input type="hidden"  name="priority" value="<?php echo $priority?>"> 
    <input type="hidden" name="access" value="<?php echo $access?>"> 
    <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']?>">
  </div>
  <br>
  <input type="radio" checked class="d-inline-block" id="">&nbsp;&nbsp;<span style="color:#000;">Paystack Card Payment</span><br />
  <img class="mt-2 ms-4 col-10" src="img/paystack-wc.png" alt="paystack">
  <br><br>
  <span style="color:#000">Our Exchange rate is at <a style="color:blue;text-decoration:underline" href='https://www.google.com/search?q=what+is+dollar+to+naira'>$1 = ₦500</a></span><br><br>
    <button type="submit" class="btn btn-outline-dark"style="width:100%" name="paybtn">Subscribe<div class="text-center d-none spins spinner-grow" style="color:#000;width: 1.5rem;height: 1.5rem;" role="status">
		<span class="text-center visually-hidden">Loading...</span>
	</div></button>
</form>
</div>
  <div class="subscribe col-12 col-md-4 col-sm-8">
    <div class="single-price py-5 mx-3 mt-3">
      <h1 class="text-uppercase lh-2 info"><?php echo $recurring?></h1>
      <div class="price">
          <h2 class="my-4">₦<?php echo $amount?></h2>
      </div>
      <div class="deals my-5">
          <h4 class="my-3"><?php echo $access?></h4>
          <h4 class="my-3"><?php echo $support?></h4>
          <h4 class="my-3"><?php echo $priority?></h4>
          <h4 class="my-3"><?php echo $streaming?></h4>
      </div>
      </div>
  </div>
</div>
  <?php include "includes/footer.php";
  ?>
  <script type="text/javascript">
$(document).ready(function(){
    var i = true;
    $('#payment-form button').click((e) => {
        $('#payment-form input.form-control').each(function(){
            if ($(this).val() == '') {
                i = false;
                return i;
            }else{
                i = true;
            }
        })
        if (i === true) {
            $('#payment-form button').css({"opacity":"0.65", "pointer-events":"none"})
                $('#payment-form button').css({"background":"transparent"})
                $('.spins').removeClass('d-none');
                $('.spins').addClass('d-inline-block');
                $('#payment-form button').contents().filter(function() {
                return this.nodeType===3;
            }).remove();
        }
    })
})
  </script>
  <?php
}else{
  header("Location: register?error=pleaseregisterfirst");
  exit();
}