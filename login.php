<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h2>Login to</h2>
        <h1>The Art of Texting</h1>
        <p> Not a user yet? <strong><a href="sorry.php">Make an account!</a></strong> </p>
        
        <!--Form to enter credentials-->
        <form method = "post" action="verifyUser.php">
            <input type = "text" name = "username" placeholder= "Username"/><br>
            <input type = "password" name = "password" placeholder="Password"/><br>
            <input type="submit" name ="submit" value="Login"/>
        </form>
        <h4> Forgot password? Click here.</h4>
        <input type="button" id = "forgot" value="Forgot!">
        <div id="output"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script >
    $("#forgot").click(function(){
      
      console.log("In button click");
       $("#output").html("<input type='text' id = 'userVer' name='userVer' placeholder='Enter your username'/> <input type='button' id = 'newUserSubmit' value='Lookup username'/>");
       
       $("#newUserSubmit").click(function(){
            var userN= $("#userVer").val();
            $.ajax({
            type : "POST",
            url  : "returnUser.php",     
            dataType : "json",
            data : {"username" : userN},            
            success : function(data){
                console.log("In success handler: ");
                
                //empty
                if(data)
                {
                    $("#output").html("Enter new password: <input type='text' id = 'newPass' name='newPass' placeholder='New password'/> <input type='button' id = 'newPassSubmit' value='Change password'/>");
                
                    $("#newPassSubmit").click(function(){
                    var passN= $("#newPass").val();
                    $.ajax({
                    type : "POST",
                    url  : "changePass.php",     
                    dataType : "json",
                    data : {"username" : userN,
                            "newPass": passN},            
                    success : function(data){
                        console.log("In success handler: ");
                        alert("YOUR PASSWORD HAS BEEN UPDATED.");
                
                },
                
        
            });
                    
                    });
                }
                else
                    $("#output").html("Username not found. Please try again.");
            },
            complete: function(data,status) { //optional, used for debugging purposes
                //debugger;
              //alert(status);
            }

        });//AJAX
          
  
    });

   
 
        });</script>

    </body>
</html>