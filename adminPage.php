<?php
session_start();

function displayQuiz(){
    //displays Quiz if session is active
    if (isset($_SESSION['username'])) {
        
    
            include 'admin.php'; 
    } else {
        header("Location: login.php"); 
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_SESSION['user']['name']."'s Inbox" ?></title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <!--Display user and logout button-->
        <div class="user-menu">
            <?php echo "Welcome ".$_SESSION['user']['name']."! ";?> 
            <input type="button" id="logoutBtn" value="Logout" />    
        </div>
        
        <div class="content-wrapper inbox">
            <!--Display Quiz Content-->
            <div id="">
                <h1>Inbox</h1>
                <?=displayQuiz()?>
                
            </div>
           
        </div>
        
        <!--Javascript files-->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/gradeQuiz.js"></script>
    </body>
</html>