<?php


include("include/connection.php");

if(isset($_POST['ac'])){
	
	$firstname =$_POST['fname'];
	$surname =$_POST['sname'];
	$username =$_POST['uname'];
	$email =$_POST['email'];
	$gender =$_POST['gender'];
	$phone =$_POST['phone'];
	$country =$_POST['country'];
	$password =$_POST['pass'];
	$confirm_password =$_POST['con_pass'];
	
	$error = array();
	
	if(empty($firstname)){
		
	$error['ac'] = "Enter Firstname";
	}else if(empty($surname)){
		$error['ac'] = "Enter Surname";
	}else if(empty($username)){
		$error['ac'] = "Enter Username";
	}else if(empty($email)){
		$error['ac'] = "Enter Email";
	}else if($gender==""){
		$error['ac'] = "Select Gender";
	}else if(empty($phone)){
		$error['ac'] = "Enter Phone";
	}else if($country==""){
		$error['ac'] = "Select Country";
	}else if(empty($password)){
		$error['ac'] = "Enter Password";
	}else if($confirm_password != $password){
		$error['ac'] = "Both Password do not match";
	}
	
	if(count($error)==0){
		
		$query = "INSERT INTO patient(firstname,surname,username,email,gender,phone,country,password, profile)
		VALUES('$firstname','$surname','$username','$email','$gender','$phone','$country','$password', 'admin01.jpg')";
		
		$res = mysqli_query($connect,$query);
		
		
		if($res){
			
			echo "<script>alert('You have successfully applied!')</script>";
			
			
			header("Location: patientlogin.php");
			
		}else{
			echo "<script>alert('Application Unsuccessful')</script>";
			
			
		}
	}
}

if (isset($error['ac'])){
							
							$l = $error['ac'];
							
							$show = "<h5 class='alert alert-danger'>$l</h5>";
							
						}else{
							$show = "";
						}
						
						
?>
<!DOCTYPE html>
<html>
<head>
<title>Create Account</title>
<style>
form{
max-width : 100%;
margin:0 auto;
background : #fff;
padding : 20px;
border-radius: 8px;
box-shadow : 0 0 10px rgba(0,0,0,1);

}

input[type=text],input[type=email], input[type=password]{
width : calc(100% - 12px);
padding : 10px;
margin-bottom : 15px;
border: 1px solid #ddd;
border-radius: 4px;
box-sizing: border-box;

}

input [type=submit]{
background-color: #4CAF50;
color:white;
padding : 12px 20px;
border : none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;

}

.col-md-4{
display:block;
margin:0 auto 20px;
width : 100px;
height: 100px;
}
</style>
</head>
<body style="background-image : url(images/hospital.jpeg); background-repeat: no-repeat; background-size:cover;">
<?php
include("include/header.html");

?>
<div style="margin-top: 60px;"></div>

<div class="container">
    <div class="col-md-12">
	    <div class="row">
		    <div class="col-md-3"></div>
			<div class="col-md-6 my-2 jumbotron">
			
			<h5 class="text-center text-info my-2"> Create Account</h5>
			
			<div>
			<?php
			echo $show;
			?>
			</div>
			    
			    <form method="post" >
						
						
				     <div class="form-group">
					 <img src="Images/images.jpg" class="col-md-4" >
					 
					      <label> First Name </label>
						  <input type="text" name="fname" class="form-control"
						  autocomplete="off" placeholder="Enter Firstname"
						  value="<?php if(isset($_POST['fname']))echo $_POST['fname'];?>">
					 </div>
					 <div class="form-group">
					      <label> Sur Name </label>
						  <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname"
						  value="<?php if(isset($_POST['sname']))echo $_POST['sname'];?>">
						  
						  
					 </div>
					 <div class="form-group">
					      <label> Username </label>
						  <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username"
						  value="<?php if(isset($_POST['uname']))echo $_POST['uname'];?>">
						  
					 </div>
					 <div class="form-group">
					      <label> Email </label>
						  <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address"
						  value="<?php if(isset($_POST['email']))echo $_POST['email'];?>">
						  
					 </div>
					
					 
					 <div class="form-group">
					 <label> Select Gender </label>
					 <select name="gender" class="form-control">
					 <option value=""> Select Gender </option>
					 <option value="Male"> Male</option>
					 <option value="Female"> Female</option>
					 </select>
					 </div>
					 
					  <div class="form-group">
					      <label> Phone Number </label>
						  <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number"
						  value="<?php if(isset($_POST['phone']))echo $_POST['phone'];?>">
						  
					 </div>
					 
					  <div class="form-group">
					      <label> Select Country </label>
						  <select name="country" class="form-control">
					 <option value=""> Select Country </option>
					 <option value="Russia"> Russia</option>
					 <option value="Sri Lanka"> Sri Lanka</option>
					 <option value="India"> India</option>
					 </select>
						  
					 </div>
					 
					  <div class="form-group">
					      <label> Password </label>
						  <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter password">
						  
					 </div>
					 
					  <div class="form-group">
					      <label> Confirm Password </label>
						  <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm password">
						  
					 </div>
					 
					 <input type="submit" value="Create" name="ac" class="btn btn-success">
					 <p> I already have an account <a href="patientlogin.php" > Click here</a></p>
				</form>
			</div>
			<div class="col-md-3"> </div>
		</div>
	</div>
</div>
</body>
</html>