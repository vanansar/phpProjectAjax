<?php
//$cert_type=$_POST['cert_type'];

$country=$_POST['country'];


				  require('connection.php');
				 
				  $res="select a.sname,a.stat_id FROM states as a LEFT JOIN countries as b on a.country_id = b.cont_id where a.country_id='$country'";
				 

$result=$con->query($res);



if($result->num_rows>0){
	?>
	
	<option value="sel_state">--Select State --</option>
	<?php
	
while($row=$result->fetch_assoc())
{


?>
<option value="<?php echo $row['stat_id'];  ?>"><?php echo $row['sname']; ?></option>

             <?php
}

}


else{
	
	echo "No Results";
}
				 
				  
				  ?>