<?php

session_start();
include("include/connection.php");

if(isset($_POST['login'])){
    
    $uname = $_POST['uname'];
    $password = $_POST['pass'];
    
    $error = array();
    
    $q = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
    $qq = mysqli_query($connect, $q);
    
    $row = mysqli_fetch_array($qq);
    
    if(empty($uname)){
        $error['login'] = "Enter Username";
    } else if(empty($password)){
        $error['login'] = "Enter Password";
    } else if($row['status']== "Pending"){
        $error['login'] = "Please wait for the admin to confirm";
    } else if($row['status']== "Rejected"){
        $error['login'] = "Try again later";
    }
    
    if(count($error) == 0){
        
        $query = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
        
        $res = mysqli_query($connect, $query);
        
        if(mysqli_num_rows($res)){
            echo "<script>alert('Done')</script>";
            $_SESSION['doctor'] = $uname;
			header("Location:doctor/index.php");
        } else {
            echo "<script>alert('Invalid Account')</script>";
        }
    }
}

if(isset($error['login'])){
    $l = $error['login'];
    $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
} else {
    $show = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Login Page</title>
    <style>
        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 1);
        }

        input[type=text], input[type=email], input[type=password] {
            width: calc(100% - 12px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .col-md-4 {
            display: block;
            margin: 0 auto 20px;
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body style="background-image: url(images/hospital.jpeg); background-repeat: no-repeat; background-size: cover;">
<?php
include("include/header.html");
?>
<div style="margin-top: 60px;"></div>

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron">
                <h5 class="text-center my-2">Doctors Login</h5>
                <div>
                    <?php 
                    echo $show;
                    ?>
                </div>
                <form method="post" class="my-2">
                    <div class="form-group">
                        <img src="images/doctor01.jpg" class="col-md-4">
                        <label> Username </label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label> Password </label>
                        <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter password">
                    </div>
                    <input type="submit" value="Submit" name="login" class="btn btn-success">
                    <p> Don't have an account? <a href="apply.php"> Apply Now!!!</a></p>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
</body>
</html>