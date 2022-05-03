
<!DOCTYPE html>
<html lang="en" dir="ltr">
    
  <head>
    <meta charset="utf-8">
    <title>Login page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    
  </head>

  <body>
   
 <div class="main">  	
    <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
         
            <form method="POST" action="SignInDB.php" id="LoginForm">
             
                <br><label for="chk" aria-hidden="true">Login</label>
                
                <input type="txt" name="txt" placeholder="Username" id="username" required="">
                <input type="password" name="password" placeholder="Password" id="password" required="">
                <?php if (isset($_GET['error'])) { ?>

                <p class="error"><?php echo $_GET['error']; ?></p>

                <?php } ?>
                <button  type="submit" name="login" id="login">Login</button>

             
                <div id="message" class="message"></div>
                <div id="text" class="text">.</div>
                
            </form>
        
        </div>

        <div class="login">
            <form method="POST" action="SignUpDB.php">
                <label for="chk" aria-hidden="true">Sign up</label>

                <input type="txt" name="txt" placeholder="Username" id="txt" required="">
                <div id="response"></div>
               

                <input type="email" name="email" placeholder="Email"  id="email" required="">
                <div id="emailStatus" class="show"></div>

                <input type="password" name="password" placeholder="Password" required="">
                

                <button type="submit" name="signup">Sign up</button>
            </form>
        </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
      
  </body>
  <script> 
    $(document).ready(function(){

        $("#email").keyup(function(){
    
            var email = $(this).val().trim();
      
            if(email != ''){
      
               $.ajax({
                  url: 'SignUpDB.php',
                  type: 'POST',
                  data: {email: email},
                  success: function(response){
      
                      $('#emailStatus').html(response);
      
                   }
               });
            }else{
               $("#emailStatus").html("");
            }

        });
    
     });
     $(document).ready(function(){

$("#txt").keyup(function(){
 //var uname =document.getElementById("username").value;
 var txt = $(this).val().trim();
  //uname = username.trim();
   if(username != ''){

      $.ajax({
         url: 'SignUpDB.php',
         type: 'POST',
         data: {txt: txt},
         success: function(response){

           $('#response').html(response);

      }
    });
  }else{
$("#response").html("");
  }

});

});
    

    
  
    </script>
  
</html>

