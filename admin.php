<?php
session_start();
include 'getConversations.php';
include 'getUserbyId.php';

//echo print_r($_SESSION);

$htmlString="<div style='text-align:center;' id='info'> Total number of Conversations: ".count($_SESSION['conversationList']) .
"<strong> | </strong>   Total number of texts: ".count($_SESSION['allTexts'])."<strong> | </strong>   Average texts per conversation: ".count($_SESSION['allTexts'])/count($_SESSION['conversationList'])."</div> <div id= 'allMessages'> <hr>";
foreach ($_SESSION['conversationList'] as $conversation) {
        
        $htmlString.="<h3> To: ".$conversation['toName'];

        $htmlString.=" - From: ".$conversation['fromName']."</h3>";
    
    $htmlString.="<h4>Latest:</h4><a href = 'indivConversationAdmin.php?convId=".$conversation['id']."'> ".getLastMessage($conversation['id'])."</a>";
    $htmlString.="<hr>";
    }

$htmlString.="</div>";
echo $htmlString;
?>
