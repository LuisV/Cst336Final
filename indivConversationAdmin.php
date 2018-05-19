<?php
session_start();
include 'getUserbyId.php';

//print_r($conversation);
$conversation= getConversationbyId($_GET['convId']);

function writeMessages($convoFrom){
    $conversationMessages= getAllTextsFromConversation($_GET['convId']);
$conversation= getConversationbyId($_GET['convId']);

   //  print_r($conversationMessages);
    if(empty($conversationMessages)){
            echo "<h1 style='text-align: center;'>No Messages in this Conversation.<h1>";
        }
        else{
            foreach ($conversationMessages as $message) {
                //echo "user".$convoFrom;
                if(($message['fromTo']=="To"))
                {
                    
                    echo "<div class='message' id ='".$message['id']."' style='text-align: right;'>";
                }
                else
                    echo "<div class ='message' id='".$message['id']."' style ='text-align: left;'>";
                echo $message['context']."</div>";
                // echo $_SESSION['user']['name']."===".$conversation['fromName'];
                // echo $_SESSION['user']['name']."===".$conversation['toName'];
            
                
            }
        }
       
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title><?php 
        
            $convoTo= $conversation['toName'];
            $convoFrom= $conversation['fromName'];
            echo "Conversation between $convoFrom and $convoTo"?></title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <div class="user-menu">
            <?php echo "Conversation between $convoFrom and $convoTo";?> 
           
                <a href='index.php'>
                <input type="button"  value="Back to Inbox " href='index.php' >    
           </a>
            
        </div>
        <div class='content-wrapper'>
        <?php  
        //print_r($conversationMessages);
        echo "<div id='texts'>";
        writeMessages($convoFrom);
        echo "</div>";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $(".message").click(function(event){
      var id= $(this).attr('id');
      var cont= document.getElementById(id).innerHTML;
      //deleteMessage(id);
      console.log(cont);
      console.log("hello");
       $.ajax({
            type : "POST",
            url  : "delete.php",     
            dataType : "json",
            data : {"id" : id},            
            success : function(data){
                console.log("In success handler: ");
                
                //empty
                alert("Text: \""+cont+"\" was deleted.");
                      
                    window.setTimeout(waiting(),1000);

            },
            complete: function(data,status) { //optional, used for debugging purposes
                //debugger;
               //alert(status);
            }

        });//AJAX
          
    });
  
  function waiting()
  {
       location.reload();
  }
    });
   // newMessage($conversation['id'],"To", $_POST['newMessage']);
 
</script>

<!--<form style="text-align: center;" action= convId']."'";?> method="POST">-->
<!--    <input type="text" name="newMessage" autocomplete="off"/>-->
<!--    <input type="submit" value="Submit"/>-->
<!--</form>-->
</div>
    </body>
</html>        