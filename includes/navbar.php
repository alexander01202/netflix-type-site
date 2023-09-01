<style>html{scroll-behavior: smooth;color:#c4c4c4;}.navbar-brand{top:30px;position:relative;transition:0.4s;}.sticky .navbar-brand{top:0px}.navbar-brand img{height:70px;width:70px}.sticky button{top: 10px;}.navbar-toggler{margin-right:15px;background: white;box-shadow: -1px -1px 6px #edeff1, 3px 3px 8px #cacfd8;position:relative;top: 30px;transition: 0.4s;}.loader{position: relative;}.loader .spinner-grow{position:absolute;margin:50%;color:darkred;}.navbarul .material-icons{position:absolute;background:white;color:#000;left:80%;top:2px;font-size:20px;padding:5px;border-radius:50%;font-weight: bold;box-shadow: -1px -1px 6px #edeff1, 3px 3px 8px #cacfd8;}.navbarul .material-icons:hover{transform:scale(1.1);}input[type="checkbox"]{display: none;}.navbar{position:fixed;width:100%;padding-top:0rem;justify-content:space-around;z-index:10000;}.navlink,.navbarul form{position:relative;top:30px}.navbarul{display:flex;align-items:center}.list-item{list-style:none;font-size:20px}.navbarul form .form-control{display: inline-block;}a{text-decoration:none;color:#fff}ul{padding-left:0}.dropdown-profile{display:block;}.dropdown-menu{top:250px;opacity:0;visibility:hidden;transition:0.4s;letter-spacing:.5px}.dropdown-menu.show{visibility:visible;opacity: 1;top: 200%;}.dropdown-menu:before{content: '';position: absolute;z-index: 500;top:-5px;right: 50px;width:13px;height:13px;background:#fff;transform:rotate(45deg);}#output{display: block !important;position: absolute;top: 80px;width: 100%;}@media screen and (min-width: 768px){.navbar-expand-md .navbar-collapse{display:contents !important;}}@media only screen and (min-width:1450px){.navbarul .material-icons{font-size:1.5rem;}.navbarul form{display:flex}}@media only screen and (min-width:2200px){.dropdown+span{font-size:34px;}.navbarul form .form-control{font-size:1.5rem;}.dropdown img{width:100px !important;height:100px !important;}.slick-slide a .row1{max-width:280px;}.navbarul .material-icons{font-size:2rem;}.autoslide{top:20%;}.navlink{font-size:34px}}@media only screen and (min-width:3000px){.navbar-brand img{height:170px;width:170px;}.dropdown+span{font-size:44px;}.dropdown img{width:150px !important;height:150px !important;}.navbar form{font-size:40px}.form-control,.btn{font-size:1em}.navlink{font-size:42px}}@media only screen and (max-width:1440px){.navbarul form {display:flex;}}@media only screen and (max-width: 768px) {.navlink:hover, .navlink:focus {font-size:19px}nav{justify-content: space-between !important;}#select{width:50px;}.navbarul form #search{border:none;outline: none;border-radius: 30px;display: none;opacity: 0;}.navbarul form{display:block;width: 0%;}.navbarul form input{transition: width 2s;}.navbarul form label{transition: 2s;}#check:checked+#select>form{width: 100%;display: flex;}#check:checked+#select{width: 100%;}#check:checked+#select ~ .navbarul{display: none;}#check:checked+#select>form > input{display: block;opacity: 1;}#check:checked+#select>form > label >span{color: #000;}}@media only screen and (max-width:576px){#output{top:50px;}.navlink{font-size:18px}}@media only screen and (max-width:380px){.navlink{font-size:16px}.nav-link{font-size:18px}}</style>
</head>
<body><?php
if(isset($_SESSION['userid'])){?>
 <nav class="navbar navbar-expand-md navbar-light" style="top: 35px;"><?php
}else{?>
    <nav class="navbar navbar-expand-md navbar-light"><?php
}?>
<ul class="navbarul navbarulbtn">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
</ul>
<a class="navbar-brand" href="https://www.yournetflixwebsite.com"><img style="border-radius:50%;" src="icons/logo.png"></a>
<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
<input type="checkbox" id="check">
<ul class="navbarul" id="select">
	<form method="post" action="index.php" autocomplete="off">
		<input class="form-control me-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
		<label for="check" name="searchbtn" id="searchbtn">
		<span class="material-icons">search</span>
		</label>
		<div id="output"></div>
	</form>
</ul>
	<!--<input list="post" id="post" name="post">-->
	<ul class="navbarul">
		<li class="list-item"><a href="https://www.yournetflixwebsite.com" class="navlink">HOME</a></li>
	</ul>
		<?php if($_SERVER['PHP_SELF'] == '/index.php'){ ?>
	<ul class="navbarul">
		<li class="list-item dropdown nav-item">
		<a href="#" class="navlink dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">GENRES</a>
			<ul class="dropdown-menu">
				<li><a class="dropdown-item" href="?category=Action">Action</a></li>
				<li><a class="dropdown-item" href="?category=Adventure">Adventure</a></li>
				<li><a class="dropdown-item" href="?category=Horror">Horror</a></li>
				<li><a class="dropdown-item" href="?category=Drama">Drama</a></li>
				<li><a class="dropdown-item" href="?category=Crime">Crime</a></li>
				<li><a class="dropdown-item" href="?category=Fantasy">Fantasy</a></li>
				<li><a class="dropdown-item" href="?category=Mystery">Mystery</a></li>
				<li><a class="dropdown-item" href="?category=Thriller">Thriller</a></li>
				<li><a class="dropdown-item" href="?category=Romance">Romance</a></li>
				<li><a class="dropdown-item" href="?category=Sci-fi">Sci-Fi</a></li>
				<li><a class="dropdown-item" href="?category=Comedy">Comedy</a></li>
			</ul>
		</li>
	</ul><?php
	} 
	?>
	<ul class="navbarul">
		<li class="list-item"><a href="https://www.yournetflixwebsite.com/FAQ" class="navlink">FAQ</a></li>
	</ul>
	<?php 
		if (!isset($_SESSION['username'])) {
		echo'
		<ul class="navbarul">
			<li class="list-item"><a href="register" class="navlink">REGISTER</a></li>
		</ul>
		<ul class="navbarul">
			<li class="list-item"><a href="login" class="navlink">LOGIN</a></li>
		</ul>';
		}
		if (isset($_SESSION['productid'])) {
		 echo'<ul class="navbarul">
			<li class="list-item">
			<a href="profile" class="text-uppercase navlink">Profile</a>
			</li>
		</ul>';
		}
	?>
	</div>
</nav>
<?php
	if (isset($_SESSION['username']) && isset($_SESSION['userid'])) {?>
	<nav class="navbar">
	<ul class="navbarul" style="margin-bottom:0rem;width:inherit;background: #262626;justify-content:flex-end;">
		<div class="dropdown">
		<?php
		$sql = "SELECT avatar FROM register WHERE id='".$_SESSION['userid']."' AND username='".$_SESSION['username']."';";
		$query=mysqli_query($conn, $sql);
		if (mysqli_num_rows($query)> 0) {
			$rows = mysqli_fetch_assoc($query);
			if ($rows['avatar'] == '') {
				?><img src="avatar/avatar.png" alt="" style="border-radius:50%;cursor:pointer; width:40px; height:40px;" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"><?php
			}else if($rows['avatar'] !== ''){
				echo '<span>&#9660;</span><img class="dropdown-toggle" src="'.substr($rows['avatar'],3).'" style="object-fit:cover;border-radius:50%;cursor:pointer; width:40px; height:40px;" alt="" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">';
			}
		}
		if (isset($_SESSION['userid'])) { ?>
			<ul style="border-radius:20px;left:-50px;" class="dropdown-menu dropdown-profile" aria-labelledby="dropdownMenuButton2">
				<li style="border-bottom:1px white solid;"><a class="dropdown-item" href="profile"><span style='font-size:16px;position:inherit;' class="mx-2 material-icons">account_circle</span>Profile</a></li>
				<li ><a class="dropdown-item" href="https://www.yournetflixwebsite.com/pricing"><span style='position:inherit;font-size:16px;' class="mx-2 material-icons">shopping_cart</span>Pricing</a></li>
				<li ><a class="dropdown-item" href="https://www.yournetflixwebsite.com/FAQ"><span style='position:inherit;font-size:16px;' class="mx-2 material-icons">help_outline</span>FAQ</a></li>
				<!--<li ><a class="dropdown-item" href="includes/logout"><span style='position:inherit;font-size:16px;' class="mx-2 material-icons">logout</span>logout</a></li>-->
				
			</ul>
			<?php
		}
		?>
		</div>
		<span class="text-uppercase" style="margin-left:.5rem!important;"><?php echo $_SESSION['username'];?></span>
		</ul>
		</nav>
		<?php
	}
?>