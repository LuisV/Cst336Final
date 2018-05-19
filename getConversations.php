<?php
session_start();


include 'connect.php';
$connect = getDBConnection();


//Checking credentials in database
$sql = "SELECT * FROM Conversation 
        WHERE ";
if($_SESSION['username']=="admin")
    $sql.="1";
else
    {    $sql.="fromId =:id
        OR toId =:id";
    }
    
$stmt = $connect->prepare($sql);
$data = array(":id"=> $_SESSION['user']['id']);
$stmt->execute($data);
$data = $stmt->fetchAll();



$_SESSION['conversationList'] = $data;

$sql= "SELECT * FROM Texts";

$stmt = $connect->prepare($sql);
$data = array(":id"=> $_SESSION['user']['id']);
$stmt->execute($data);
$data = $stmt->fetchAll();
$_SESSION['allTexts']= $data;

?>

