<?php
include_once("include.php");

try{
    $email = trim($_GET["email"]);
    $password = trim($_GET["password"]);
    $full_name = trim($_GET["full_name"]);

    if(!$email) throw new Exception("Email is requried.");
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception("Email is not valid.");
    if(!$password) throw new Exception("Password is requried.");
    if(!$full_name) throw new Exception("Full Name is requried.");

    $user = mysqli_query(Database::con(), "select * from users where email = '$email' and password='$password'");
    $user = mysqli_fetch_assoc($user);
    if($user) throw new Exception("Email already exists. try another one");
    
    $result = mysqli_query(Database::con(), "insert into `users` (`email`, `password`, `full_name`, `status`) values ('$email', '$password', '$full_name', 1)");

    Output::success("Successfully Registered.", []);
}catch(Exception $e){
    Output::error($e->getMessage());
}
?>