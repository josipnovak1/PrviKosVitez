<?php

session_start();

$con = mysqli_connect('localhost','id11438358_korisnik','jure12345678');

mysqli_select_db($con, 'id11438358_j_j');

$name = $_POST['name'];
$pass = $_POST['password'];

$s = " select * from usertable where name = '$name' && password = '$pass'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    header('location:home.php');
}else{
    header('location:login.php');
}


?>