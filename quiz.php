<?php
session_start();
include 'getConversations.php';
include 'getUserbyId.php';

    

//echo print_r($_SESSION);

$htmlString="<div id= 'allMessages'> <hr>";
foreach ($_SESSION['conversationList'] as $conversation) {
   // console("In here");
   //print_r($conversation);
  // echo "User ".$_SESSION['user']['id'];
    if($conversation['fromId']==$_SESSION['user']['id'])
    {
        
        $htmlString.="<h3> To: ".$conversation['toName']."</h3>";
        
        
    }
    else
    {
        $htmlString.="<h3> From: ".$conversation['fromName']."</h3>";
    }
    $htmlString.="<h4>Latest:</h4><a href = 'indivConversation.php?convId=".$conversation['id']."'> ".getLastMessage($conversation['id'])."</a>";
    $htmlString.="<hr>";
}
$htmlString.="</div>";
echo $htmlString;
?>
