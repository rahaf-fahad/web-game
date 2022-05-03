# ProjectCS438 - Game <br>
* **User authentication( create a user account and then user can login the game )**<br>
* **Save the score of the user to the database** <br>
* **Show the heights score of all players at the end  of each game.** <br>

<br><br>

## User authentication
* **Create a user account :**
* The file [htmlSignIn.php](https://github.com/RanaMHM/ProjectCS438/blob/main/htmlSignIn.php) contains:<br><br>
1- Designing the html login page by style in [style.css](https://github.com/RanaMHM/ProjectCS438/blob/main/style.css)figure1. <br>
<div>  <img width="565" alt="login" src="https://user-images.githubusercontent.com/52053143/166151941-2e1e6fac-43f4-45f0-94d8-de2f118dbcad.png">  </div>
figure1: login and signup page. <br>


2- Javascript and Ajax code to verify that the username and email are not in the database:
 ```
 <script> 
    $(document).ready(function(){
        $("#email").keyup(function(){
          var email = $(this).val().trim();
            if(email != ''){
      //Ajax------
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

```

<br><br><hr>
The player creates an account for himself by registering a username, email and password, the figure 1

<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img width="350" alt="4" alt="signup" src="https://user-images.githubusercontent.com/52053143/166150983-d581044c-3ff3-4ff3-bd64-0ed5614fea65.png" ></div>
<div style="text align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Figure1: Signup page</div>
<br>
The availability of the username and email are checked because each player must have a special username and email and it is not possible to register with them again.



[SignUpDB.php](https://github.com/RanaMHM/ProjectCS438/blob/main/SignUpDB.php)
