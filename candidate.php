<?php 
include 'connection.php';

if($_SESSION['email']=true){
header("Location: index.php");
}
?>


<?php 
$error="";
if(isset($_POST['save']))
{    
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email_id=$_POST['email_id'];
    $password=$_POST['password'];
    $country=$_POST['country'];
    $state=$_POST['state'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$constitution=$_POST['constitution'];
	$aadhar_no=$_POST['aadhar_no'];
	$symbol=$_POST['symbol'];
	$photo=$_FILES['photo']['name'];
    $temp_image=$_FILES['photo']['tmp_name'];
    
    	$photo1=$_FILES['photo1']['name'];
    $temp_image1=$_FILES['photo1']['tmp_name'];
    
    $check=mysqli_query($con,"SELECT * FROM tb_candidate WHERE email_id='$email_id'");
    $checkrow=mysqli_num_rows($check);
    
        if(empty($email_id))
        {
            $error="*Must be filled";
        }
        elseif($checkrow>0)
        {
            $error="*Already exist";
        }
        else
        {
            if(move_uploaded_file($temp_image,"image1/".$photo))            
            {      
            
            move_uploaded_file($temp_image1,"symbol/".$photo1);                                             
                $insert_query="INSERT INTO tb_candidate (first_name,last_name,age,gender,email_id,password,country,state,city,address,phone,constitution,aadhar_no,symbol,photo)VALUES('$first_name','$last_name','$age','$gender','$email_id','$password','$country','$state','$city','$address','$phone','$constitution','$aadhar_no','$symbol','$photo')";
               
			    $result=$con->query($insert_query);
				if ($result) {
				$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: support@girafficinfoworld.com' . "\r\n" .  
    'Reply-To: support@girafficinfoworld.com' . "\r\n" .        
    'X-Mailer: PHP/' . phpversion();
	
		
$message1 .= '<h1 style="color:green">Election Commission</h1><br><h4 style="color:green;margin:40px 20px 20px 40px;"><span style="color:green">Hello Candidate</span>,<br><span style="color:orange">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Email Id is:'.$email_id.',&nbsp;&nbsp;&nbsp;Password:'.$password.'</h4><br><a href="http://girafficinfoworld.com/online_election/candidate">Click Here for the Verification</a>';
$sent= mail($email_id, "Election Commission Notification" , $message1 , $headers);
				
				
				echo "<script> window.location='candidatelist.php'</script>";
                                          
              } 
			  
            }                            
        }
}
?> 



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Online Election</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <?php include 'include/navi.php'; ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
	<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/a.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["email"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dashboard.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Voters</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  
          <ul class="treeview-menu">
            <li><a href="adduser.php"><i class="fa fa-circle-o"></i> Add Voters</a></li>
            <li><a href="userlist.php"><i class="fa fa-circle-o"></i> Voters List</a></li>
          </ul>
		  
		 
        </li>
        <li class="active treeview">
			<a href="#">
				<i class="fa fa-pie-chart"></i>
					<span>Candidate</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
			</a> 
			<ul class="treeview-menu">
				<li class="active"><a href="candidate.php"><i class="fa fa-circle-o"></i> Add Candidate</a></li>
				<li><a href="candidatelist.php"><i class="fa fa-circle-o"></i> Candidate List</a></li>
			</ul>
		 </li>
		 <li class="treeview">
			<a href="#">
				<i class="fa fa-pie-chart"></i>
					<span>Annonucement</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
			</a> 
			<ul class="treeview-menu">
				<li><a href="annonucement.php"><i class="fa fa-circle-o"></i> Add Annonucement</a></li>
				<li><a href="annonucementlist.php"><i class="fa fa-circle-o"></i> Annonucement List</a></li>
			</ul>
		 </li> 
		  <li class="treeview">
			<a href="#">
				<i class="fa fa-pie-chart"></i>
					<span>Complaints</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
			</a> 
			<ul class="treeview-menu">
				<li><a href="candidate_complain.php"><i class="fa fa-circle-o"></i> Candidate Complaint</a></li>
				<li><a href="voter_complain.php"><i class="fa fa-circle-o"></i> Voter Complaint</a></li>
			</ul>
		 </li> 
		</ul>
    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Candidate
        <small>new</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="candidate.php">Add Candidate</a></li>
      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Click The Button</h3>
            </div>
            <div class="box-body">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Launch Default Modal
              </button>  
            </div>
          </div>
        </div>
      </div>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Candidate</h4>
              </div>
         <div class="modal-body">
			  
			<form method="post" role="form" enctype="multipart/form-data">  
				<div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">First Name</label>
							<input type="text" name="first_name" class="form-control"  placeholder="First Name" Required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Last Name</label>
							<input type="text" name="last_name" class="form-control"  placeholder="Last Name" Required>
						</div>
						<div class="form-group">
									<label>Gender</label>
						<div class="radio" >
							<label>
							<input type="radio" name="gender" value="Male">Male
							</label>
						</div>
						<div class="radio">
							<label>
							<input type="radio" name="gender" value="Female">Female
							</label>
						</div>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Age</label>
							<input type="text" name="age" class="form-control"  placeholder="Age" Required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea name="address" class="form-control"  rows="3" placeholder="Enter ..." Required></textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputPhone">Phone</label>
							<input type="text" name="phone" class="form-control"  placeholder="Phone" Required>
						</div>
						
						
						<div class="form-group">
							
							<label for="exampleInputCountry">Country</label>
							<select class="form-control" name="country" onchange="sel_country()" id="country">
								<option value="sel_country">Select Country</option>
                                <?php 
                                
									$select_query="SELECT * FROM countries";
									$result=$con->query($select_query);
                  
									while($fetch1=$result->fetch_object())
									{
								?>              
                                <option value="<?php echo $fetch1->id;?>"><?php echo $fetch1->name;?></option>
                                  
                                  <?php }?>
							</select>
						</div>		
						<div class="form-group">	
										
							<label for="exampleInputState">State</label>
							<select class="form-control" onchange="sel_state()" id="state" name="state">
								<option value="sel_state">Select Your State</option>
							</select>
						</div>		
									
						<div class="form-group">
							<label for="exampleInputCity">City</label>
							<select class="form-control" id="city" name="city">
								<option value="sel_city">Select Your City</option>
                            </select>
						</div>
						<div class="form-group">
							<label for="exampleInputConstitution">Constitution</label>
							<input type="text" name="constitution" class="form-control" placeholder="Constitution" Required>
						</div>
						<div class="form-group">
							<label for="exampleInputAadhar">Aadhar No</label>
							<input type="text" name="aadhar_no" class="form-control" placeholder="Aadhar No" Required>
						</div>
						<div class="form-group">
							<label for="exampleInputSymbol">Symbol</label>
							<input type="file" name="photo1" Required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" name="email_id" class="form-control" placeholder="Enter email" Required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" name="password" class="form-control"  placeholder="Password" Required>
						</div>
						
						<div class="form-group">
							<label for="exampleInputFile">Photo</label>
							<input type="file" name="photo" Required>

                  <p class="help-block">Example block-level help text here.</p>
						</div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" Required> Check me out
                  </label>
                </div>
              

     
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="save" class="btn btn-primary">Save</button>
              </div>
			  </div>
              <!-- /.box-body -->
			  </div>
			</form>
			</div>
			</div>
            <!-- /.modal-content -->
		</div>
          <!-- /.modal-dialog -->
	</div>
        <!-- /.modal -->

        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2018 <a href="http://www.girafficinfoworld.com/">Giraffic Info World</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

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
