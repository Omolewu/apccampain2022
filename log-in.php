<?php 
session_start();
require('inc/db.php');
//treat my input
function treat($text){
    $text = trim($text);
    $text =stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
} 
$response =[];

$res = json_decode(file_get_contents('php://input'), true);
if(empty(trim(treat($res['username'])))){
    $response['usernameErr'] =" Your username is required";
}else{
    $username = treat($res['username']);
}
if(empty(treat($res['password']))){
    $response['passwordErr'] =" Your Password is required";
}else{
   $password = md5(treat($res['password']));
}

if(!$response){
$check = $dbc->prepare("SELECT * FROM admin_user WHERE username =? AND password =?");
$check ->bind_param('ss', $username,$password);
$check->execute();
$result = $check->get_result();

if($result->num_rows >0){
$get= $result->fetch_assoc();

$_SESSION['id'] = $get['admin_id'];
$_SESSION['name'] = $get['username'];
$response['success'] = "Access Granted";
}
else{
    $response['loginErr'] = "Invalid details";
}
}
// header('Content-Type:application/json');
echo json_encode($response);
?>