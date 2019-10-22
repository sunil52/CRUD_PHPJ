<?php

include("connection.php");

$input = filter_input_array(INPUT_POST);

$email = mysqli_real_escape_string($link, $input["email"]);
$name = mysqli_real_escape_string($link, $input["name"]);
$number = mysqli_real_escape_string($link, $input["number"]);
$password = mysqli_real_escape_string($link, $input["password"]);
//$password = md5($password);
$gender = mysqli_real_escape_string($link, $input["gender"]);
$comment = mysqli_real_escape_string($link, $input["comment"]);

if($input["action"] === 'edit')
{
     $id = $input["id"];
     $sql = "update company_new set email='$email', name='$name', number='$number', password='$password', gender='$gender', comment='$comment' where id=$id";
    mysqli_query($link, $sql);
    
}

if($input["action"] === 'delete')
{   
//    $id = $input["id"];
    $sql = "DELETE FROM `company_new` WHERE id='".$input["id"]."'";
    mysqli_query($link, $sql);
    
}

echo json_encode($input);


?>