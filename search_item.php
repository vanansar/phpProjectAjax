<?php
session_start();
if(isset($_SESSION['username'])){
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Bright Pocket| Search Items</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gifty Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!-- dropdown -->
<script src="js/jquery.easydropdown.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script>

function search_item()
{
	
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("mydiv").innerHTML=xmlhttp.responseText;
    }
  }
 value=document.getElementById("search_box").value;
xmlhttp.open("GET","search_action.php?key="+value,true);
xmlhttp.send();
}


</script>
<style>
#content{
	background-color:#CCC;
	height:600px;
		
}
#user_table2 {
background-color: floralwhite;
position: absolute;
margin-top: 96px;
  margin-left: 329px;
}

input,textarea{
	border: none;	
}
#msg{
	
	height: 50px;
	width: 311px;
	position: absolute;
	margin-left: 967px;		
}
#search_div{
  position: absolute;
  margin-left: 270px;
  margin-top: 47px;
  background-color: springgreen;
	
}
</style>
</head>
<body>
<div class="header_top">
  <div class="container">
  	<div class="header_top-box">
     <div class="header-top-left">
			 
   				    <div class="clearfix"></div>
	  </div>
			 <div class="cssmenu">
				<ul>
					<li class="active"><a href="user_home.php">Home</a></li> <!--	<li><a href="register.html">Sign Up</a></li>  -->
                    <li><a href="sign_out.php">Sign Out</a></li>	
                    <li><a href="">     </a></li> 
                    <li><a href="">     </a></li> 
                    <li><a href=""><?php echo "Welcome ".$first_name." !!";  ?></a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
    </div>
  </div>
</div>
<div class="header_bottom">
	<div class="container">
	 <div class="header_bottom-box">
		<div class="header_bottom_left">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt=""/></a>
			</div>
			
			<div class="clearfix"> </div>
		</div>
		<div class="header_bottom_right">
			
	  		<ul class="bag">
	  			
	  			<div class="clearfix"> </div>
	  		</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
 </div>
</div>
<div class="menu">
	<div class="container">
		<div class="menu_box">
	     <ul class="megamenu skyblue">
			
			<li><a class="color10"  href="user_home.php">My Profile</a></li>			
			<li><a style="background-color:red"  href="pocket.php">Bright Pocket</a></li>
			<li><a class="color3" href="storage.php">Bright Storage</a></li>
			<li><a class="color7" href="market.php">Bright Market</a></li>
			<li><a class="color8" href="aboutuse.php">ABOUT</a></li>
			<div class="clearfix"> </div>
		 </ul>
	  </div>
</div>
</div>

 <div id="msg">
					<p style="color:#F00;font-size:large"><b><?php if(isset($_REQUEST['msg'])){
																	echo $_REQUEST['msg'];} ?></b></p>
</div>

<div id="content">
<div id="search_div">
<form>
Search :<input type="text" name="search_box" id="search_box" onKeyPress="search_item()" />
</form>
</div>
<div id="mydiv"></div>


<div id="profile_menu">
<ul style="list-style:none;margin-left:0px;margin-left: -39px;position: absolute;margin-top: 48px;">
<li><a href="pocket.php"><button style="width:240px;height:50px;background-color:#FFF">Add Items</button></a></li>
<li><a href="list_item.php"><button style="width:240px;height:50px;background-color:#FFF">List Items</button></a></li>
<li><a href="search_item.php"><button style="width:240px;height:50px;background-color:red">Search Items</button></a></li>

</ul>
</div>

</div>





</body>
</html>		
<?php

}
else{
header('location:login.php');	
}
?>