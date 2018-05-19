<?php
session_start();
include 'connect.php';
$connect = getDBConnection();


$sql = "UPDATE User SET password= :newPass WHERE username=:user";

// set parameters and execute
$stmt = $connect -> prepare($sql);
$stmt->execute(array(":newPass"=>$_POST['newPass'], ":user"=>$_POST['username']));

echo json_encode(5);
?>
