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


$phone= treat($res['phone']) ;
$lg= treat($res['lg']) ;
$ward= treat($res['ward']) ;
$poll= treat($res['poll']) ;
$card= treat($res['code']) ;
$vote= treat($res['vote']) ;
$reason= treat($res['reason']) ;
$comment= treat($res['comment']) ;

if (empty(treat($res['fullname']))) {
    $response['fullnameErr'] = "Full Name is required";
}else{
    $fullname = treat($res['fullname']);
}
if (empty(treat($res['phone']))) {
    $response['phoneErr'] = "Phone is required";
}else{
    $phone = treat($res['phone']);
}
if (empty(treat($res['lg']))) {
    $response['lgErr'] = "LG is required";
}else{
    $lg= treat($res['lg']);
}
if (empty(treat($res['poll']))) {
    $response['pollErr'] = "Poll Unit is required";
}else{
    $poll = treat($res['poll']);
}
if (empty(treat($res['ward']))) {
    $response['wardErr'] = "ward is required";
}else{
    $ward=treat($res['ward']);
}
if (empty(treat($res['vote']))) {
    $response['voteErr'] = "You have to select one";
}else{
    $vote = treat($res['vote']);
}
if (empty(treat($res['card']))) {
    $response['cardErr'] = "Votes Card Number is required";
}else{
    $card = treat($res['card']);
}

if(!$response){
    $check = $dbc->prepare("SELECT * FROM members WHERE card_no =?");
    $check->bind_param('s', $card);
    $check->execute();
    $result = $check->get_result();
    $check->execute();
      $result = $check->get_result();
    if ($result->num_rows >0) {
        $response['exist'] = "User With this Voters card Have been Added Before.";
    }else{
        $insert = $dbc->prepare("INSERT INTO members(fullname, phone, lg, ward, poll_unit, card_no, vote, reason, comment)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?) ");
       $insert->bind_param('sssssssss', $fullname, $phone, $lg, $ward, $poll, $card, $vote, $reason, $comment );
        
       if ($insert->execute()) {
        $response['success'] = "Form Submitted Successfully.";
       }
        
   
    }
}

echo json_encode($response);
?>