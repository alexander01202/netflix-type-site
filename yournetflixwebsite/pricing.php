<?php
	include "includes/header.php";
	if(isset($_GET['success'])){
	    if($_GET['success'] == "subrenew"){
	        ?>
	       <script>
	           alert('Please Select Plan Again');
	       </script><?php
	    }
	}
?>
<style>
*{
    font-family:Arial;
}
h4 b sup{
    cursor:pointer;
}
.wrapper{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    top: 100px;
}
.single-price{
    background: #c4c4c4;
    box-shadow: 1px 1px 20px rgba(0,0,0,0.5);
    text-align: center;
    transition: 0.3s;
}
.price{
    width:150px;
    height:150px;
    border-radius: 50%;
    border: 2px solid #da4357;
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
    color: #f00;
}
.price h2{
    font-size: 40px;
    color: #262626;
    line-height: 2.5;
}
.single-price:hover{
    background: #da4357;
    box-shadow: 0 0 15px #fff;
    transform: scale(1.1);
    z-index: 1;
}
.single-price:hover .price{
    border-color: #fff;
}
.single-price a{
    text-decoration: none;
    background: #da4357;
display: inline-block;
margin: 10px auto;
}
.single-price a button{
    padding: 10px 60px;
    color: #c4c4c4;
}
.single-price:hover a button{
    background: #262626;
    border:none;
}
.single-price:hover .pop{
    top: 0px;
    /* transform: scale(1.1); */
    opacity: 1;
}
label a button{
    position: relative;
    overflow: hidden;
}
label a button::before{
    content: "";
    position: absolute;
    left: 0;
    width: 100%;
    background: #fff;
    z-index: -1;
    transition: 0.8s;
    top: 0;
    border-radius: 0 0 50% 50%;
    height: 0%;
}
label a button:hover::before{
    height: 180%;
}
.single-price:hover a button:hover{
    color: #da4357;
    transform: scale(1.1);
    transition: 0.4s;
}
.pop{
position: absolute;
    background: #c4c4c4;
    color: #262626;
    padding: 2px 10px;
    opacity: 0;
    margin-left: 85px;
    border-radius: 0px 0px 20px 20px;
}
.section{
    letter-spacing: 2px;
    font-size: 24px;
}
.section h1{
    width: 50%;
    color: #c4c4c4;
    border-radius: 0 20px 20px 0;
    background: #da4357;
    padding: 5px 20px;
    font-weight: bold;
    display: inline-block;
}
.material-icons{
    font-size: 38px;
    margin-right: 12px;
}
.section span,.section .dropdown{
float:right;
font-weight: normal;
}
@media screen and (min-width: 968px){
    .single-price{
    width: 20%;
    }
    .material-icons{
    font-size: 38px;
    margin-right: 12px;
    }
}
@media screen and (max-width: 560px){
    .single-price{
        margin: 30px 0 30px 0;
    }
    .section h1{
        width: 100%;
    }
    .section span{
        font-size: 20px;
    }
    .material-icons {
        font-size: 30px;
        margin-right: 0px;
    }
}
</style>
<?php
	include "includes/navbar.php";
?>
    <div class="container-fluid">
       
        <div class="row wrapper">
        <div class="col-12 my-4 fw-bold section"><h1>MOVIES :</h1> 
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <span>Sort by</span><span class="material-icons">sort</span></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="drop dropdown-item" href="#">all</a></li>
                    <li><a class="drop dropdown-item" href="#">daily</a></li>
                    <li><a class="drop dropdown-item" href="#">weekly</a></li>
                    <li><a class="drop dropdown-item" href="#">monthly</a></li>
                    <li><a class="drop dropdown-item" href="#">quarterly</a></li>
                </ul>
            </div>
        </div>
        <!--<div class="single-price py-5 mx-3 mt-3 col-sm-4 col-9">-->
        <!--<form method="post" action="payment?watch=movies">-->
        <!--    <h1 class="text-uppercase lh-2 info">daily</h1>-->
        <!--    <input type="hidden" value="daily" name="recurring">-->
        <!--    <input type="hidden" value="Access to all Movies" name="access">-->
        <!--    <input type="hidden" value="24/7 support" name="support">-->
        <!--    <input type="hidden" value="Request Movie: Priority low" name="priority">-->
        <!--    <input type="hidden" value="Only streaming, No downloads" name="streaming">-->
        <!--    <div class="price">-->
        <!--        <h2 class="my-4">$0.4</h2>-->
        <!--    </div>-->
        <!--    <div class="deals my-5">-->
        <!--        <h4 class="my-3">Access to all <b>Movies</b></h4>-->
        <!--        <h4 class="my-3"><b>24/7</b> support</h4>-->
        <!--        <h4 class="my-3">Movies Available in small sizes</h4>-->
        <!--        <h4 class="my-3">Request Movie: <b>Priority low</b></h4>-->
        <!--        <h4 class="my-3"><b>Only streaming,</b> No downloads</h4>-->
        <!--        <h4 class="my-3"><b>Cancel Anytime</b></h4>-->
        <!--    </div>-->
        <!--    enable php -->
        <!--    if (isset($_SESSION['userid']) && isset($_SESSION['productid'])) { -->
        <!--        if($_SESSION['productid'] == 0){-->
        <!--          ?>-->
        <!--        <label for="movie"><a class="text-uppercase fw-bold"><button type="submit" class="btn" name="btnpay">SELECT</button></a></label><input type="hidden" value="200" name="movie"></form> enable php   -->
        <!--        }elseif($_SESSION['productid'] > 0){-->
        <!--            ?>-->
        <!--            </form>-->
        <!--        <label for="movie1"><a class="text-uppercase fw-bold" href="switchsub"><button class="btn">SELECT</button></a></label>enable php -->
        <!--        }-->
        <!--    }else{ ?>-->
        <!--        <label for="movie1"><a class="text-uppercase fw-bold" href="register?error=pleaseregisterfirst"><button class="btn">SELECT</button></a></label></form>enable php -->
        <!--    }?>-->
            
        <!--</div>-->
        <div class="single-price py-5 mx-3 mt-3 col-sm-4 col-9">
        <form method="post" action="payment?watch=movies">
            <input type="hidden" value="weekly" name="recurring">
            <input type="hidden" value="Access to all <b>Movies</b>" name="access">
            <input type="hidden" value="<b>24/7</b> support" name="support">
            <input type="hidden" value="Request Movie: <b>Priority medium</b>" name="priority">
            <input type="hidden" value="Download & Streaming available" name="streaming">
            <h1 class="text-uppercase lh-2 info">weekly</h1>
            <div class="price">
                <h2 class="my-4">$0.99</h2>
            </div>
            <div class="deals my-5">
                <h4 class="my-3">Access to all <b>Movies</b></h4>
                <h4 class="my-3"><b>24/7</b> support</h4>
                <h4 class="my-3">Movies Available in small sizes</h4>
                <h4 class="my-3">Request Movie: <b>Priority medium</b></h4>
                <h4 class="my-3">Download & Streaming available</h4>
                <h4 class="my-3"><b>Cancel Anytime</b></h4>
            </div>
            <?php
            if (isset($_SESSION['userid']) && isset($_SESSION['productid'])) {
            if($_SESSION['productid'] == 0){ ?>
                <label for="movie"><a class="text-uppercase fw-bold"><button type="submit" class="btn" name="btnpay">SELECT</button></a></label><input type="hidden" value="500" id="movie2" name="movie"></form><?php
            }elseif($_SESSION['productid'] > 0){ ?>
                </form><label for="movie2"><a class="text-uppercase fw-bold" href="switchsub"><button class="btn">SELECT</button></a></label><?php
                }
            }else{ ?>
                <label for="movie2"><a class="text-uppercase fw-bold" href="register?error=pleaseregisterfirst"><button class="btn">SELECT</button></a></label></form><?php 
            }?>
        </div>
        <div class="single-price py-5 mx-3 mt-3 col-sm-4 col-9">
        <form method="post" action="payment?watch=movies">
            <input type="hidden" value="monthly" name="recurring">
            <input type="hidden" value="Access to all <b>Movies</b>" name="access">
            <input type="hidden" value="<b>24/7</b> support" name="support">
            <input type="hidden" value="Request Movie: <b>Priority High</b>" name="priority">
            <input type="hidden" value="Download & Streaming available" name="streaming">
            <h1 class="text-uppercase lh-2 info">monthly</h1>
            <div class="pop">Popular</div>
            <div class="price">
                <h2 class="my-4">$2.99</h2>
            </div>
            <div class="deals my-5">
                <h4 class="my-3">Access to all <b>Movies</b></h4>
                <h4 class="my-3"><b>24/7</b> support</h4>
                <h4 class="my-3">Movies Available in small sizes</h4>
                <h4 class="my-3">Request Movie: <b>Priority High</b></h4>
                <h4 class="my-3">Download & Streaming available</h4>
                <h4 class="my-3"><b>Cancel Anytime</b></h4>
            </div>
            <?php
            if (isset($_SESSION['userid']) && isset($_SESSION['productid'])) {
                if($_SESSION['productid'] == 0){
                ?>
                <label for="movie"><a class="text-uppercase"><button type="submit" class="btn" name="btnpay">SELECT</button></a></label><input type="hidden" value="1500" id="movie3" name="movie"></form><?php   
                }elseif($_SESSION['productid'] > 0){ ?></form>
                    <label for="movie3"><a class="text-uppercase fw-bold" href="switchsub"><button type="submit" class="btn">SELECT</button></a></label><?php
                }
            }else{?>
                <label for="movie3"><a class="text-uppercase fw-bold" href="register?error=pleaseregisterfirst"><button type="submit" class="btn">SELECT</button></a></label></form><?php 
            }?>
        </div>
        <div class="single-price py-5 mx-3 mt-3 col-sm-4 col-9">
        <form method="post" action="payment?watch=movies">
            <input type="hidden" value="quarterly" name="recurring">
            <input type="hidden" value="Access to all <b>Movies</b>" name="access">
            <input type="hidden" value="<b>24/7</b> support" name="support">
            <input type="hidden" value="Request Movie: <b>Priority Very High</b>" name="priority">
            <input type="hidden" value="Download & Streaming available" name="streaming">
            <h1 class="text-uppercase lh-2 info">quarterly</h1><h5>(3 months)</h5>
            <div class="pop">Best Plan</div>
            <div class="price">
                <h2 class="my-4">$8.39</h2>
            </div>
            <div class="deals my-5">
                <h4 class="my-3">Access to all <b>Movies</b></h4>
                <h4 class="my-3"><b>24/7</b> support</h4>
                <h4 class="my-3">Movies Available in small sizes</h4>
                <h4 class="my-3">Request Movie: <b>Priority very High</b></h4>
                <h4 class="my-3">Download & Streaming available</h4>
                <h4 class="my-3"><b>Cancel Anytime</b></h4>
            </div>
            <?php
            if (isset($_SESSION['userid']) && isset($_SESSION['productid'])) {
                if($_SESSION['productid'] == 0){
                    ?>
                <label for="movie"><a class="text-uppercase"><button type="submit" class="btn" name="btnpay">SELECT</button></a></label><input type="hidden" value="4200" id="movie4" name="movie"></form><?php
                }elseif($_SESSION['productid'] > 0){
                    ?></form>
                <label for="movie4"><a class="text-uppercase fw-bold" href="switchsub"><button type="submit" class="btn">SELECT</button></a></label><?php
                }
            }else{?>
                <label for="movie4"><a class="text-uppercase fw-bold" href="register?error=pleaseregisterfirst"><button type="submit" class="btn">SELECT</button></a></label></form><?php 
            }?>
        </div>
        </div>

        <!-- series -->
        <div class="row wrapper">
        <div class="my-4 fw-bold section"><h1>SERIES :</h1></div>
        <div class="single-price py-5 mx-3 mt-3 col-sm-4 col-9">
        <form method="post" action="payment?watch=series">
            <input type="hidden" value="daily" name="recurring">
            <input type="hidden" value="Access to all <b>Series</b>" name="access">
            <input type="hidden" value="<b>24/7</b> support" name="support">
            <input type="hidden" value="Request Movie: <b>Priority low</b>" name="priority">
            <input type="hidden" value="<b>Only streaming,</b> No downloads" name="streaming">
            <h1 class="text-uppercase lh-2 info">daily</h1>
            <div class="price">
                <h2 class="my-4">$0.6</h2>
            </div>
            <div class="deals my-5">
                <h4 class="my-3">Access to all <b>Series</b></h4>
                <h4 class="my-3"><b>24/7</b> support</h4>
                <h4 class="my-3">Series Available in small sizes</h4>
                <h4 class="my-3">Request Movie: <b>Priority low</b></h4>
                <h4 class="my-3"><b>Only streaming,</b> No downloads</h4>
                <h4 class="my-3"><b>Cancel Anytime</b></h4>
            </div>
            <?php
            if (isset($_SESSION['userid']) && isset($_SESSION['productid'])) {
                if($_SESSION['productid'] == 0){
                     ?>
                <label for="movie"><a class="text-uppercase"><button type="submit" class="btn" name="btnpay">SELECT</button></a></label><input type="hidden" value="300" name="movie"></form><?php
                }elseif($_SESSION['productid'] > 0){
                    ?></form>
                <label for="movie4"><a class="text-uppercase fw-bold" href="switchsub"><button class="btn">SELECT</button></a></label><?php 
                }
            }else{?>
                <label for="movie4"><a class="text-uppercase fw-bold" href="register?error=pleaseregisterfirst"><button class="btn">SELECT</button></a></label></form><?php 
            }?>
        </div>
        <div class="single-price py-5 mx-3 mt-3 col-sm-4 col-9">
        <form method="post" action="payment?watch=series">
            <input type="hidden" value="weekly" name="recurring">
            <input type="hidden" value="Access to all <b>Series</b>" name="access">
            <input type="hidden" value="<b>24/7</b> support" name="support">
            <input type="hidden" value="Request Movie: <b>Priority medium</b>" name="priority">
            <input type="hidden" value="Download & Streaming available" name="streaming">
            <h1 class="text-uppercase lh-2 info">weekly</h1>
            <div class="price">
                <h2 class="my-4">$1.6</h2>
            </div>
            <div class="deals my-5">
                <h4 class="my-3">Access to all <b>Series</b></h4>
                <h4 class="my-3"><b>24/7</b> support</h4>
                <h4 class="my-3">Series Available in small sizes</h4>
                <h4 class="my-3">Request Movie: <b>Priority medium</b></h4>
                <h4 class="my-3">Download & Streaming available</h4>
                <h4 class="my-3"><b>Cancel Anytime</b></h4>
            </div>
            <?php
            if (isset($_SESSION['userid']) && isset($_SESSION['productid'])) {
                if($_SESSION['productid'] == 0){
                    ?>
                <label for="movie"><a class="text-uppercase"><button type="submit" class="btn" name="btnpay">SELECT</button></a></label><input type="hidden" value="800" name="movie"></form><?php
                }elseif($_SESSION['productid'] > 0){
                    ?></form>
                <label for="movie4"><a class="text-uppercase fw-bold" href="switchsub"><button type="submit" class="btn">SELECT</button></a></label><?php 
                }
            }else {?>
                <label for="movie4"><a class="text-uppercase fw-bold" href="register?error=pleaseregisterfirst"><button type="submit" class="btn">SELECT</button></a></label></form><?php 
            }?>
        </div>
        <div class="single-price py-5 mx-3 mt-3 col-sm-4 col-9">
        <form method="post" action="payment?watch=series">
            <input type="hidden" value="monthly" name="recurring">
            <input type="hidden" value="Access to all <b>Series</b>" name="access">
            <input type="hidden" value="<b>24/7</b> support" name="support">
            <input type="hidden" value="Request Movie: <b>Priority High</b>" name="priority">
            <input type="hidden" value="Download & Streaming available" name="streaming">
            <h1 class="text-uppercase lh-2 info">monthly</h1>
            <div class="pop">Popular</div>
            <div class="price">
                <h2 class="my-4">$4.99</h2>
            </div>
            <div class="deals my-5">
                <h4 class="my-3">Access to all <b>Series</b></h4>
                <h4 class="my-3"><b>24/7</b> support</h4>
                <h4 class="my-3">Series Available in small sizes</h4>
                <h4 class="my-3">Request Movie: <b>Priority High</b></h4>
                <h4 class="my-3"><b>Download & streaming available</b></h4>
                <h4 class="my-3"><b>Cancel Anytime</b></h4>
            </div>
            <?php
            if (isset($_SESSION['userid']) && isset($_SESSION['productid'])) {
                if($_SESSION['productid'] == 0){
                     ?>
                <label for="movie"><a class="text-uppercase"><button type="submit" class="btn" name="btnpay">SELECT</button></a></label><input type="hidden" value="2500" name="movie"></form><?php
                }elseif($_SESSION['productid'] > 0){
                    ?>
                <label for="movie4"><a class="text-uppercase fw-bold" href="switchsub"><button type="submit" class="btn">SELECT</button></a></label></form><?php
                }
            }else {?>
                <label for="movie4"><a class="text-uppercase fw-bold" href="register?error=pleaseregisterfirst"><button type="submit" class="btn">SELECT</button></a></label></form><?php 
            }?>
        </div>
        <div class="single-price py-5 mx-3 mt-3 col-sm-4 col-9">
        <form method="post" action="payment?watch=series">
            <input type="hidden" value="quarterly" name="recurring">
            <input type="hidden" value="Access to all <b>Series</b>" name="access">
            <input type="hidden" value="<b>24/7</b> support" name="support">
            <input type="hidden" value="Request Movie: <b>Priority Very High</b>" name="priority">
            <input type="hidden" value="Download & Streaming available" name="streaming">
            <h1 class="text-uppercase lh-2 info">quarterly</h1><h5>(3 months)</h5>
            <div class="pop">Best plan</div>
            <div class="price">
                <h2 class="my-4">$10.99</h2>
            </div>
            <div class="deals my-5">
                <h4 class="my-3">Access to all <b>Series</b></h4>
                <h4 class="my-3"><b>24/7</b> support</h4>
                <h4 class="my-3">Series Available in small sizes</h4>
                <h4 class="my-3">Request Movie: <b>Priority Very High</b></h4>
                <h4 class="my-3"><b>Download & streaming available</b></h4>
                <h4 class="my-3"><b>Cancel Anytime</b></h4>
            </div>
            <?php
            if (isset($_SESSION['userid']) && isset($_SESSION['productid'])) {
                if($_SESSION['productid'] == 0){
                    ?>
                <label for="movie"><a class="text-uppercase"><button type="submit" class="btn" name="btnpay">SELECT</button></a></label><input type="hidden" value="5500" name="movie"></form><?php
                }elseif($_SESSION['productid'] > 0){
                    ?></form>
                <label for="movie4"><a class="text-uppercase fw-bold" href="switchsub"><button type="submit" class="btn">SELECT</button></a></label><?php
                }
            }else {?>
                <label for="movie4"><a class="text-uppercase fw-bold" href="register?error=pleaseregisterfirst"><button type="submit" class="btn">SELECT</button></a></label></form><?php 
            }?>
        </div>
        </div>


        <!-- movies & series -->
        <div class="row wrapper">
        <div class="my-4 fw-bold section"><h1>MOVIES & SERIES :</h1></div>
        <div class="single-price py-5 mx-3 mt-3 col-sm-4 col-9">
        <form method="post" action="payment?watch=movie n series">
            <input type="hidden" value="daily" name="recurring">
            <input type="hidden" value="Access to all <b>Movies & Series</b>" name="access">
            <input type="hidden" value="<b>24/7</b> support" name="support">
            <input type="hidden" value="Request Movie: <b>Priority low</b>" name="priority">
            <input type="hidden" value="<b>Only streaming,</b> No downloads" name="streaming">
            <h1 class="text-uppercase lh-2 info">daily</h1>
            <div class="price">
                <h2 class="my-4">$0.8</h2>
            </div>
            <div class="deals my-5">
                <h4 class="my-3">Access to all <b>Movies & Series</b></h4>
                <h4 class="my-3"><b>24/7</b> support</h4>
                <h4 class="my-3">All Available in small sizes</h4>
                <h4 class="my-3">Request Movie: <b>Priority low</b></h4>
                <h4 class="my-3"><b>Only streaming,</b> No downloads</h4>
                <h4 class="my-3"><b>Cancel Anytime</b></h4>
            </div>
            <?php
            if (isset($_SESSION['userid']) && isset($_SESSION['productid'])) {
                if($_SESSION['productid'] == 0){ ?>
                <label for="movie"><a class="text-uppercase"><button type="submit" class="btn" name="btnpay">SELECT</button></a></label><input type="hidden" value="400" name="movie"></form><?php
                }elseif($_SESSION['productid'] > 0){ ?></form>
                <label for="movie4"><a class="text-uppercase fw-bold" href="switchsub"><button type="submit" class="btn">SELECT</button></a></label><?php
                }
            }else {?>
                <label for="movie4"><a class="text-uppercase fw-bold" href="register?error=pleaseregisterfirst"><button type="submit" class="btn">SELECT</button></a></label></form><?php 
            }?>
        </div>
        <div class="single-price py-5 mx-3 mt-3 col-sm-4 col-9">
        <form method="post" action="payment?watch=movie n series">
            <input type="hidden" value="weekly" name="recurring">
            <input type="hidden" value="Access to all <b>Series & movies</b>" name="access">
            <input type="hidden" value="<b>24/7</b> support" name="support">
            <input type="hidden" value="Request Movie: <b>Priority Meduim</b>" name="priority">
            <input type="hidden" value="Download & Streaming available" name="streaming">
            <h1 class="text-uppercase lh-2 info">weekly</h1>
            <div class="price">
                <h2 class="my-4">$1.99</h2>
            </div>
            <div class="deals my-5">
                <h4 class="my-3">Access to all <b>Movies & Series</b></h4>
                <h4 class="my-3"><b>24/7</b> support</h4>
                <h4 class="my-3">All Available in small sizes</h4>
                <h4 class="my-3">Request Movie: <b>Priority Medium</b></h4>
                <h4 class="my-3"><b>Download & streaming available</b></h4>
               <h4 class="my-3"><b>Cancel Anytime</b></h4>
            </div>
            <?php
            if (isset($_SESSION['userid']) && isset($_SESSION['productid'])) {
            if($_SESSION['productid'] == 0){?>
                <label for="movie"><a class="text-uppercase"><button type="submit" class="btn" name="btnpay">SELECT</button></a></label><input type="hidden" value="1000" name="movie"></form><?php
            }elseif($_SESSION['productid'] > 0){ ?></form>
                <label for="movie4"><a class="text-uppercase fw-bold" href="switchsub"><button type="submit" class="btn">SELECT</button></a></label><?php
            }
            }else {?>
                <label for="movie4"><a class="text-uppercase fw-bold" href="register?error=pleaseregisterfirst"><button type="submit" class="btn">SELECT</button></a></label></form><?php 
            }?>
        </div>
        <div class="single-price py-5 mx-3 mt-3 col-sm-4 col-9">
        <form method="post" action="payment?watch=movie n serie">
            <input type="hidden" value="monthly" name="recurring">
            <input type="hidden" value="Access to all <b>Series & movies</b>" name="access">
            <input type="hidden" value="<b>24/7</b> support" name="support">
            <input type="hidden" value="Request Movie: <b>Priority High</b>" name="priority">
            <input type="hidden" value="Download & Streaming available" name="streaming">
            <h1 class="text-uppercase lh-2 info">monthly</h1>
            <div class="pop">Popular</div>
            <div class="price">
                <h2 class="my-4">$6.4</h2>
            </div>
            <div class="deals my-5">
                <h4 class="my-3">Access to all <b>Movies & Series</b></h4>
                <h4 class="my-3"><b>24/7</b> support</h4>
                <h4 class="my-3">All Available in small sizes</h4>
                <h4 class="my-3">Request Movie: <b>Priority High</b></h4>
                <h4 class="my-3"><b>Download & streaming available</b></h4>
                <h4 class="my-3"><b>Cancel Anytime</b></h4>
            </div>
            <?php
            if (isset($_SESSION['userid']) && isset($_SESSION['productid'])) {
            if($_SESSION['productid'] == 0){
                ?>
                <label for="movie"><a class="text-uppercase"><button type="submit" class="btn" name="btnpay">SELECT</button></a></label><input type="hidden" value="3200" name="movie"></form><?php   
            }elseif($_SESSION['productid'] > 0){
                ?></form>
                <label for="movie4"><a class="text-uppercase fw-bold" href="switchsub"><button type="submit" class="btn">SELECT</button></a></label><?php
            }
            }else {?>
                <label for="movie4"><a class="text-uppercase fw-bold" href="register?error=pleaseregisterfirst"><button type="submit" class="btn">SELECT</button></a></label></form><?php 
            }?>
        </div>
        <div class="single-price py-5 mx-3 mt-3 col-sm-4 col-9">
        <form method="post" action="payment?watch=movie n serie">
            <input type="hidden" value="quarterly" name="recurring">
            <input type="hidden" value="Access to all <b>Series & movies</b>" name="access">
            <input type="hidden" value="<b>24/7</b> support" name="support">
            <input type="hidden" value="Request Movie: <b>Priority Very High</b>" name="priority">
            <input type="hidden" value="Download & Streaming available" name="streaming">
            <h1 class="text-uppercase lh-2 info">quarterly</h1><h5>(3 months)</h5>
            <div class="pop">Best Plan Overall</div>
            <div class="price">
                <h2 class="my-4">$15.99</h2>
            </div>
            <div class="deals my-5">
                <h4 class="my-3">Access to all <b>Movies & Series</b></h4>
                <h4 class="my-3"><b>24/7</b> support</h4>
                <h4 class="my-3">All Available in small sizes</h4>
                <h4 class="my-3">Request Movie: <b>Priority Very High</b></h4>
                <h4 class="my-3"><b>Download & streaming available</b></h4>
                <h4 class="my-3"><b>Cancel Anytime</b></h4>
            </div>
            <?php
            if (isset($_SESSION['userid']) && isset($_SESSION['productid'])) {
            if($_SESSION['productid'] == 0){
                ?>
                <label for="movie"><a class="text-uppercase"><button type="submit" class="btn" name="btnpay">SELECT</button></a></label><input type="hidden" value="8000" name="movie"></form><?php
            }elseif($_SESSION['productid'] > 0){
                ?></form>
                <label for="movie4"><a class="text-uppercase fw-bold" href="switchsub"><button type="submit" class="btn">SELECT</button></a></label><?php
            }
            }else {?>
                <label for="movie4"><a class="text-uppercase fw-bold" href="register?error=pleaseregisterfirst"><button type="submit" class="btn">SELECT</button></a></label></form><?php 
            }?>
        </div>
        </div>
    </div>

<?php include 'includes/footer.php';?>
<script type="text/javascript">
$(function () {
        $("[rel='tooltip']").tooltip();
    });
const dropitems = document.querySelectorAll('.drop');
const info = document.querySelectorAll('.info');
var items = Array.from(dropitems)
var infos = Array.from(info)
    items.forEach(item => {
        item.addEventListener('click', (e) => {
            infos.forEach(info => {
                if (info.innerHTML !== e.target.innerHTML && e.target.innerHTML !== "all") {
                    info.parentElement.parentElement.style.display = "none";
                }else{
                    info.parentElement.parentElement.style.display = "block";
                }
            });
        })
    });
</script>