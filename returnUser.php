<?php
session_start();

include 'connect.php';
$connect = getDBConnection();


//Checking credentials in database
$sql = "SELECT * FROM User 
        WHERE username =:username";
$stmt = $connect->prepare($sql);
$data = array(":username"=> $_POST['username']);
$stmt->execute($data);
$user = $stmt ->fetch(PDO::FETCH_ASSOC);
//redirecting user to quiz if credentials are valid

echo json_encode($user);

?>

