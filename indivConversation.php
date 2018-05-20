<?php
session_start();
include 'getUserbyId.php';
include 'input.php';
//print_r($conversation);
$conversation= getConversationbyId($_GET['convId']);

function writeMessages(){
    $conversationMessages= getAllTextsFromConversation($_GET['convId']);
$conversation= getConversationbyId($_GET['convId']);

   //  print_r($conversationMessages);
    if(empty($conversationMessages)){
            echo "<h1 style='text-align: center;'>No Messages in this Conversation.<h1>";
        }
        else{
            foreach ($conversationMessages as $message) {
                if(($conversation['fromName']==$_SESSION['user']['name'] && $message['fromTo']=="From") ||
                ($conversation['toName']==$_SESSION['user']['name'] && $message['fromTo']=="To") )
                {
                    echo "<div style='text-align: right;'>";
                }
                else
                    echo "<div style ='text-align: left;'>";
                echo $message['context']."</div>";
                // echo $_SESSION['user']['name']."===".$conversation['fromName'];
                // echo $_SESSION['user']['name']."===".$conversation['toName'];
            
                
            }
        }
        if(!empty($_POST['newMessage']))
        {
            //echo $conversation['fromName']."===".$_SESSION['user']['name'];
            if($conversation['fromName']==$_SESSION['user']['name'])
            {
                echo "From";
                newMessage($conversation['id'],"From", $_POST['newMessage']);
            }
            else {
                echo "TO!";
                newMessage($conversation['id'],"To", $_POST['newMessage']);
            }
            header('Location: indivConversation.php?convId='.$_GET['convId']); 
            
        }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title><?php 
        if($conversation['fromName']== $_SESSION['user']['name'])
            $convoWith= $conversation['toName'];
        else
            $convoWith= $conversation['fromName'];
            echo "Conversation with $convoWith"?></title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <div class="user-menu">
            <?php echo "Conversation with  ".$convoWith;?> 
           
                <a href='index.php'>
                <input type="button"  value="Back to Inbox " href='index.php' >    
           </a>
            
        </div>
        <div class='content-wrapper'>
        <?php  
        //print_r($conversationMessages);
        echo "<div id='texts'>";
        writeMessages();
        echo "</div>";
?>

<form style="text-align: center;" action= <?php echo "'indivConversation.php?convId=".$_GET['convId']."'";?> method="POST">
    <input type="text" name="newMessage" autocomplete="off"/>
    <input type="submit" value="Submit"/>
</form>
</div>
<footer>
    
</footer>
    </body>
    
    
</html>        