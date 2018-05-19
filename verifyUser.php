<?php
session_start();

include 'connect.php';
$connect = getDBConnection();


//Checking credentials in database
$sql = "SELECT * FROM User 
        WHERE username =:username
        AND password =:password";
$stmt = $connect->prepare($sql);
$data = array(":username"=> $_POST['username'], ":password"=>($_POST['password']));
$stmt->execute($data);
$user = $stmt ->fetch(PDO::FETCH_ASSOC);

//redirecting user to quiz if credentials are valid
if(isset($user['username'])){
$_SESSION['user']= $user;
log(print_r($user));
$_SESSION['username'] = $user['username'];
header('Location: index.php');

} else {
    echo "The values entered are incorrect. <a href='login.php'>Retry</a>";
}

?>

