<?php
session_start();
include 'connect.php';
$connect = getDBConnection();


$toFromStringDB= mysql_escape_string($toFromString);
$messageStringDB=  mysql_escape_string($messageString);
$date="May 14";

$sql = "DELETE FROM Texts WHERE id=".$_POST['id'];
$stmt = $connect->prepare($sql);
//$data = array(":username"=> $_POST['username'], ":password"=>($_POST['password']));
$stmt->execute();
//$user = $stmt ->fetch(PDO::FETCH_ASSOC);



echo json_encode(5);
?>

