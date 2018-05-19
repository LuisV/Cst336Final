<?php
session_start();

if(!isset($connect))
    {
    include 'connect.php';}
    
function main(){

$connect = getDBConnection();
    
    $sql = "SELECT * FROM User 
        WHERE id = ".$_SESSION['user']['id'];
$stmt = $connect->prepare($sql);
// $data = array(":username"=> $_POST['username'], ":password"=>($_POST['password']));
// $stmt->execute($data);
$user = $stmt ->fetch(PDO::FETCH_ASSOC);

//redirecting user to quiz if credentials are valid
return $user;
}

function getLastMessage($convoId)
{
   
  $connect = getDBConnection();
    
    $sql = "SELECT context FROM Texts 
        WHERE conversationId = $convoId ORDER BY id DESC LIMIT 1";
$stmt = $connect->prepare($sql);
$data = array(":convoId"=> $convoId);
$stmt->execute();
$text = $stmt->fetch();
//echo "Text:".$text[0]."!!! ";
//redirecting user to quiz if credentials are valid
if( isset($text[0]))
    return $text[0];
    else {
        return "~Empty. No messages yet~";
    }
}
function getAllTextsFromConversation($convoId)
{
    $connect = getDBConnection();
    
    $sql = "SELECT * FROM Texts 
        WHERE conversationId = $convoId ";
$stmt = $connect->prepare($sql);
$data = array(":convoId"=> $convoId);
$stmt->execute();
$text = $stmt->fetchAll();
//echo "Text:".$text[0]."!!! ";
//redirecting user to quiz if credentials are valid
return $text;
}

function getConversationbyID($convoId){
    $connect = getDBConnection();
    
    $sql = "SELECT * FROM Conversation 
        WHERE id = $convoId ";
$stmt = $connect->prepare($sql);
$data = array(":convoId"=> $convoId);
$stmt->execute();
$text = $stmt->fetch();
//echo "Text:".$text[0]."!!! ";
//redirecting user to quiz if credentials are valid
return $text;
}
?>
