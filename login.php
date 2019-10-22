<?php

 include("connection.php");

if(isset($_POST["login"])){
    
    $email = $_POST["lemail"];
    $password = $_POST["lpassword"];
    $password = md5($password);
    

    
    $sql = "SELECT * FROM company_new where email='".$email."'and password='".$password."' limit 1";
    
    
    $res = mysqli_query($link,$sql);
    
    if(!$res){
    echo '<div class="alert alert-danger" style="text-align: center;">Error running the query!</div>';
    exit;
    }
    
    $count = mysqli_num_rows($res);
    
    if($count !== 1){
        echo '<div class="alert alert-danger">Wrong Username or Password</div>';
    }else{
        header('location:list.php');
    }
    
}
 
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Bootstrap  -->
    <!--
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
-->
    <link rel="stylesheet" type="text/css" href="style.css">




    <script>
    function loginValidate() {
        var email = document.form.lemail.value;
        var password = document.form.lpassword.value;

        if (email == null || email == "") {
            alert("Email can't be empty");
            return false;
        }


        if (password == null || password == "") {
            alert("Password can't be empty");
            return false;

        } else if (password.length <= 6) {
            alert("Password must be at least 6 characters long.");
            return false;
        }

    }
    </script>

</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-auto">
            <div class="card custom-card">
                <div class="card-header">
                    <h3>Sign In</h3>
                </div>

                <div class="card-body">
                    <form method="POST" name="form" onsubmit="return loginValidate()">
                        <div class="input-group form-group">
                            <input type="email" class="form-control" placeholder="Email" name="lemail">
                        </div>

                        <div class="input-group form-group">
                            <input type="password" class="form-control" placeholder="Password" name="lpassword">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="login" value="Login" class="btn btn-success login_btn">
                            <button type="button" class="btn btn-success"><a href="register.php">Register</a></button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>