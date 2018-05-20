<?php
session_start();


    
function newMessage($conversationId,$toFromString,$messageString){

$connect = getDBConnection();

$idToGoInDB= intval($conversationId);

$toFromStringDB= $toFromString;
$messageStringDB=  $messageString;
$date="May 14";
//Checking credentials in database
//FINISH THIS 
/*INSERT INTO `Texts` (`id`, `conversationId`, `fromTo`, `context`, `date`) VALUES (NULL, , 'To', 'Do I know you?', 'May 12');*/
$sql = "INSERT INTO Texts (id, conversationId, fromTo, context, date) VALUES (NULL, '$idToGoInDB', '$toFromStringDB', '$messageStringDB', '$date');";
$stmt = $connect->prepare($sql);
//$data = array(":username"=> $_POST['username'], ":password"=>($_POST['password']));
$stmt->execute();
//$user = $stmt ->fetch(PDO::FETCH_ASSOC);


}

?>

