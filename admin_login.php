<?php

session_start();
include("include/connection.php");

if(isset($_POST['login'])){
	
	$username =$_POST['uname'];
	$password =$_POST['pass'];
	
	$error = array();
	
	if(empty($username)){
		
		$error['admin'] = "Enter Username";
	}else if(empty($password)){
		$error['admin'] = "Enter Password";
	}
	
	if(count($error)==0){
		
		$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
		
		$result = mysqli_query($connect,$query);
		
		
		if(mysqli_num_rows($result)==1){
			
			echo "<script>alert('You have login as an Admin')</script>";
			
			$_SESSION['admin']=$username;
			
			header("Location: admin/index.php");
			exit();
		}else{
			echo "<script>alert('Invalid Username or Password')</script>";
		}
	}
}
?>


<!DOCTYPE html>
<html>
<head>
<title>CLMS Home page</title>
<style>
form{
max-width : 400px;
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
			<div class="col-md-6 jumbotron">
			    
			    <form method="post" class="my-2">
				
				        
						<div >
						<?php
						
						if (isset($error['admin'])){
							
							$sh = $error['admin'];
							
							$show = "<h4 class='alert alert-danger'>$sh</h4>";
							
						}else{
							$show = "";
						}
						
						echo $show;
						
						?>
						</div>
						
						
				     <div class="form-group">
					 <img src="images/admin.jpeg" class="col-md-4" >
					      <label> Username </label>
						  <input type="text" name="uname" class="form-control"
						  autocomplete="off" placeholder="Enter Username">
					 </div>
					 <div class="form-group">
					      <label> Password </label>
						  <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter password">
						  
					 </div>
					 
					 <input type="submit" value="Submit" name="login" class="btn btn-success">
				</form>
			</div>
			<div class="col-md-3"> </div>
		</div>
	</div>
</div>

</body>
</html>