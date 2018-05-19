<?php
session_start();
include 'connect.php';

$connect = getDBConnection();
//Checking credentials in database
//FINISH THIS 
/*INSERT INTO `Texts` (`id`, `conversationId`, `fromTo`, `context`, `date`) VALUES (NULL, , 'To', 'Do I know you?', 'May 12');*/
$sql = "SELECT id from User WHERE username = '".$_POST['toName']."'"; 
$stmt = $connect->prepare($sql);
//$data = array(":username"=> $_POST['username'], ":password"=>($_POST['password']));
$stmt->execute();
$user = $stmt ->fetch(PDO::FETCH_ASSOC);

if(!empty($user))
{
    //print_r ($user);
    $sql = "INSERT INTO `Conversation`(`id`, `fromId`, `toId`, `fromName`, `toName`) VALUES ( NULL, ".$_POST['fromId'] .", ".$user['id'] .",'".$_POST['fromName']."', '".$_POST['toName']."')"; 
$stmt = $connect->prepare($sql);
//$data = array(":username"=> $_POST['username'], ":password"=>($_POST['password']));
$stmt->execute();
echo json_decode(5);
}
else
    echo json_encode(null);



?>

