<?php
include_once("include.php");

try{
    $email = trim($_GET["email"]);
    $password = trim($_GET["password"]);

    if(!$email) throw new Exception("Email is requried.");
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception("Email is not valid.");
    if(!$password) throw new Exception("Password is requried.");

    $user = mysqli_query(Database::con(), "select * from users where email = '$email' and password='$password'");
    $user = mysqli_fetch_assoc($user);
    if(!$user) throw new Exception("Email/Password is incorrect.");

    $user_id = $user["id"];
    $token = Common::generate_token();

    UserModel::update($user_id, ["token" => $token]);

    Output::success("Successfully Loggged in.", [
        "user_id" => $user_id,
        "email" => $user["email"],  
        "full_name" => $user["full_name"],
        "token" => $token
    ]);
}catch(Exception $e){
    Output::error($e->getMessage());
}
?>