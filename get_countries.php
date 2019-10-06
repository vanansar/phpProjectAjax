	<?php
require('connection.php');
$country=$_POST['country'];
$state=$_POST['state'];
//echo $state;
/*
$res=$con->query("select name from countries where cont_id='$country'")->fetch_assoc();
$row=$con->query("select * from states where stat_id='$state'")->fetch_assoc();


$res="select a.sname,a.stat_id FROM states as a LEFT JOIN countries as b on a.country_id = b.cont_id where a.country_id='$country'";


*/










/*

if($res>0 || $row>0)
{
	echo $res['name'].'<br>';
echo $row['sname'];	
}*/










?>