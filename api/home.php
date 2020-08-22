<?php
include_once("include.php");

try{
    $token = trim($_GET["token"]);

    if(!$token) throw new Exception("Token is requried.");
    
    $user = mysqli_query(Database::con(), "select * from users where token = '$token' limit 1");
    $user = mysqli_fetch_assoc($user);
    if(!$user) throw new Exception("Invalid Token, please login again.");

    $data = [
        "user_id" => $user["id"],
        "email" => $user["email"],
        "full_name" => $user["full_name"],
    ];
    Output::success("Successfully got the data.", $data);
}catch(Exception $e){
    Output::error($e->getMessage());
}
?>