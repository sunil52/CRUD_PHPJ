<?php

include("connection.php");

if(isset($_POST["register"])){
    
    $email = $_POST["lemail"];
    $name = $_POST["fname"];
    $number = $_POST["number"];
    $password = md5($_POST["lpassword"]);
    $gender = $_POST["gender"];
    $comment = $_POST["comment"];
    
    $sql = "SELECT * FROM company_new WHERE email = '$email'";
    
        $result = mysqli_query($link,$sql);

    if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
    }
    
    $results = mysqli_num_rows($result);
    
    if($results){
        echo '<div class="alert alert-danger">Email already exist!</div>';
        exit;
    }
    
    $sql1 = "INSERT INTO company_new (`email`, `name`, `number`, `password`, `gender`, `comment`) VALUES ('$email', '$name', '$number', '$password', '$gender', '$comment')";
    
    $res = mysqli_query($link,$sql1);
    if(!$res){
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
    exit;
        
    }else{
        
        echo '<div class="alert alert-success">Registered successful</div>';
    }
    
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

    <script>
    function signupValidate() {
        var email = document.form.lemail.value;
        var name = document.form.fname.value;
        var number = document.form.number.value;
        var password = document.form.lpassword.value;
        var comment = document.form.comment.value;

        if (email == null || email == "") {
            alert("Email can't be empty");
            return false;
        }

        if (name == null || name == "") {
            alert("Name can't be empty");
            return false;
        }

        if (number == null || number == "") {
            alert("Number can't be empty");
            return false;
        }

        if (comment == null || comment == "") {
            alert("Comment can't be empty");
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
            <div class="card custom-card-reg">
                <div class="card-header">
                    <h3>Register</h3>
                </div>

                <div class="card-body">
                    <form method="POST" name="form" onsubmit="return signupValidate()">
                        <div class="input-group form-group">
                            <input type="email" class="form-control" placeholder="Email" name="lemail">
                        </div>

                        <div class="input-group form-group">
                            <input type="text" class="form-control" placeholder="Full Name" name="fname" maxlength="15">
                        </div>

                        <div class="input-group form-group">
                            <input type="number" name="number" class="form-control" id="number"
                                placeholder="Phone Number" maxlength="12">
                        </div>

                        <div class="input-group form-group">
                            <input type="password" class="form-control" placeholder="Password" name="lpassword">
                        </div>
                        <div class="input-group form-group">
                            <select class="form-control" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="comment"
                                placeholder="Please enter minimum 10 and maximum 50 character" minlength="10"
                                maxlength="50" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="register" value="Register" class="btn btn-success login_btn">
                            <button type="button" class="btn btn-success"><a href="login.php">Login</a></button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</body>

</html>