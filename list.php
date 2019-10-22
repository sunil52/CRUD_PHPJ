<!--Start php code for add data to Database-->
<?php

include("connection.php");

if(isset($_POST["add"])){
    
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
            header('location:list.php');
        echo '<div class="alert alert-success">New Data Added</div>';
            
    }
    
}

?>
<!--End php code for add data to Database-->

<!--Start php code for displaying list -->
<?php 
include("connection.php");
    
$sql = "select * from company_new";
    
 $result = mysqli_query($link,$sql);

?>

<!--End php code for displaying list -->
<html>

<head>
    <title>List page</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="jquery-tabledit-1.2.3/jquery.tabledit.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css">

<!--script for adding data-->
    <script>
    function addValidate() {
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
    <div class="container-fluid">
        <div class="table-reponsive">
            <h1 class="data" style="margin-top: 4%;">Display Data</h1>
                <div align="left">
                    <button class="btn btn-info" name="add" id="add" type="button" style="height:7%; width:5%;"><a data-toggle="collapse" href="#collapse1">Add</a></button>
            </div>
            
            <table id="editable_table" class="table table-hover table-bordered" style="margin-top: 2%;">
                <tbody>
                    <tr id="trow">
                        <th>Id</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Password</th>
                        <th>Gender</th>
                        <th>comment</th>
                        <th>Edit/Delete</th>
                    </tr>
                </tbody>
                <tbody>
                    <?php
                    while($res = mysqli_fetch_array($result))
                    {
                        echo '
                        <tr>
                            <td>'.$res["id"].'</td>
                            <td>'.$res["email"].'</td>
                            <td>'.$res["name"].'</td>
                            <td>'.$res["number"].'</td>
                            <td>'.$res["password"].'</td>
                            <td>'.$res["gender"].'</td>
                            <td>'.$res["comment"].'</td>
                        </tr> 
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <form method="POST"  name="form" onsubmit="return addValidate()">
        <div class="row collapse" id="collapse1">
           <div class="col-md-12">
              <div class="col-md-2">
                            <input type="email" class="form-control" placeholder="Email" name="lemail">
                        </div>

                        <div class="col-md-2">
                            <input type="text" class="form-control" placeholder="Full Name" name="fname" maxlength="15">
                        </div>

                        <div class="col-md-2">
                            <input type="number" name="number" class="form-control" id="number"
                                placeholder="Phone Number" maxlength="12">
                        </div>

                        <div class="col-md-2">
                            <input type="password" class="form-control" placeholder="Password" name="lpassword">
                        </div>
                        <div class="col-md-1">
                            <select class="form-control" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <textarea class="form-control" name="comment"
                                placeholder="Please enter minimum 10 and maximum 50 character" minlength="10"
                                maxlength="50" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="add" value="Save" class="btn btn-success login_btn">
                        </div>
           </div> 
        </div>
        </form>
        
    </div>

</body>

</html>

<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $('#editable_table').Tabledit({
        url: 'action.php',
        columns: {
            identifier: [0, "id"],
            editable:[[1, 'email'],
                [2, 'name'],
                [3, 'number'],
                [4, 'password'],
                [5, 'gender'],
                [6, 'comment']]
        },
        restoreButton: false,
        onSuccess: function(data, textStatus, jqXHR) {
            if (data.action == 'delete') {
                $('#' + data.id).remove();
            }
        }
    });

});
</script>