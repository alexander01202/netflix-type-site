<?php
    include "includes/header.php"
?>
<style>
.contactus form{
background: #C4C4C4;
border-radius: 10px;
margin-top: 100px;
font-family: 'Montserrat', sans-serif;
padding: 25px;
z-index: 1;
}
.contactus form label{
    margin: 10px 5px;
    font-weight: bold;
    color: #222;
}
.contactus form textarea:focus{
    outline: none;
}
.contactus form button{
    display: block;
    margin: 10px auto;
    width: 50%;
    border-radius: 20px;
}
.contactus .loginus{
    margin-top: 200px;
}
.ctnsuccess{
    color: green;
    z-index: 2;
    font-weight: bold;
    font-size: 26px;
    letter-spacing: 1px;
}
#wrapper{
    position: absolute;
    width: 100%;
    height: 100%;
    background: url("img/418724.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    filter: blur(8px);
    -webkit-filter: blur(8px);
}
</style>
<?php
    include "includes/navbar.php";
?>
    
    <div id="wrapper"></div>

        <div class="container contactus row mx-auto my-auto">
            <form action="includes/contactform" class="col-md-10 mx-auto" method="POST">
            <?php
                if (isset($_GET["mailsent"])) {
                   if ($_GET["mailsent"] == "success") {
                       echo "<p class = 'ctnsuccess text-center'>Mail Sent</p>";
                   }
                }
            ?>
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="contactusEmail" required placeholder="Your Email">
                <label for="subject">Subject:</label>
                <input type="text"class="form-control" name="subject" required placeholder="Enter topic">
                <label for="message" style="display:block;">Message:</label>
                <textarea name="message" cols="93" rows="10" placeholder="Write your message" required style="color:#000;resize:none;width:100%"></textarea>
                <button type="submit" class="btn btn-outline-success" name="contactbtn">SEND</button>
            </form>
        </div>
<?php include 'includes/footer.php';