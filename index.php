<?php
require('connection.php');


?>


<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<form method="POST" action="get_countries.php" role="form" enctype="multipart/form-data">
<select class="form-control" name="country" onchange="sel_country()" id="country">
								<option value="sel_country">Select Country</option>
                                <?php 
	
									$select_query="SELECT * FROM countries";
									$result=$con->query($select_query);
                  
									while($fetch1=$result->fetch_object())
									{
								?>              
                                <option value="<?php echo $fetch1->cont_id;?>"><?php echo $fetch1->name;?></option>
                                  
                                  <?php }?>
							</select>
							<hr>
							<br>
							<div class="form-group">	
										
							<label for="exampleInputState">State</label>
							<select class="form-control" onchange="sel_state()" id="state" name="state">
								<option value="sel_state">Select Your State</option>
							</select>
						</div>
							
						<input class="btn btn-primary" type="submit" value="click">	

</form>
							
							
							
							
<script type="text/javascript">
function sel_country(){

//var cert_type = $('#cert_typ').val();
var country=$('#country').val();




	$.ajax({
		url: 'search_state.php',
		type:'POST',
		data:{country:country},
		success:function(result){
			//alert(result);return false;
			  $('#state').html(result);
			 
		 }
	  });
}

function sel_state(){
//var cert_type = $('#cert_typ').val();
var state=$('#state').val();


	$.ajax({
		url: 'search_city.php',
		type:'POST',
		data:{state:state},
		success:function(result){
			//alert(result);return false;
			  $('#city').html(result);
			 
		 }
	  });
}
</script>

						
	
</body>
</html>
