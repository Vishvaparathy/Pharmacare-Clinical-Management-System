
<!DOCTYPE html>
<html>
<head>
<title>CLMS Home page</title>
</head>
<body>

<?php
include("include/header.html");

?>

<div style="margin-top : 50px"></div>
<div class= "container">
    <div class= "col-md-12">
        <div class="row">
            <div class="col-md-3 mx-1 shadow">
               <img src="Images\info.jpeg" style="width:100%; height: 61%" >
			   
			 <h5 class="text-center"> Click here for more information </h5>
			 
			 <a href="contact.html">
			 <button class="btn btn-success my-3" style="margin-Left: 30%;"> More Info </button>
			 </a>
            </div>

            <div class="col-md-4 mx-1 shadow">
			<img src="Images\patient.jpeg" style="width:100%;">
			
			<h5 class="text-center"> Create Account so that we can take good care for you! </h5>
			 
			 <a href="account.php">
			 <button class="btn btn-success my-3" style="margin-Left: 30%;"> Create Account !!!</button>
			 </a>

            </div>
			
			<div class="col-md-4 mx-1 shadow">
             <img src="Images\doctor.jpeg" style="width:100%; height:68%">
			 
			 <h5 class="text-center"> We are employing for doctors </h5>
			 
			 <a href="apply.php">
			 <button class="btn btn-success my-3" style="margin-Left: 30%;"> Apply Now !!!</button>
			 </a>
            </div>

        </div>

    </div>
</div>
</body>
</html>