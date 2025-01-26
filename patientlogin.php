<?php

session_start();
include("include/connection.php");

if(isset($_POST['login'])){
    
    $uname = $_POST['uname'];
    $password = $_POST['pass'];
    
    $error = array();
    
    if(empty($uname)){
        $error['login'] = "Enter Username";
    } elseif(empty($password)) {
        $error['login'] = "Enter Password";
    }
    
    if(count($error) == 0){
        
        $query = "SELECT * FROM patient WHERE username='$uname' AND password='$password'";
        
        $res = mysqli_query($connect, $query);
        
        if(mysqli_num_rows($res)){
            echo "<script>alert('Done')</script>";
            $_SESSION['patient'] = $uname;
            header("Location:patient/index.php");
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
    <title>Patient Login Page</title>
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
            <div class="col-md-6 my-5 jumbotron">
                <h5 class="text-center my-2">Patient Login</h5>
                <div>
                    <?php 
                    echo $show;
                    ?>
                </div>
                <form method="post" class="my-2">
                    <div class="form-group">
                        <img src="images/patient.png" class="col-md-4">
                        <label> Username </label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label> Password </label>
                        <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter password">
                    </div>
                    <input type="submit" value="Login" name="login" class="btn btn-info my-3">
                    <p> Don't have an account? <a href="account.php"> Click Here  </a></p>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
</body>
</html>
