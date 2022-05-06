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
### Creat acount
The player creates an account for himself by registering a username, email and password, the figure 2

<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img width="350" alt="4" alt="signup" src="https://user-images.githubusercontent.com/52053143/166150983-d581044c-3ff3-4ff3-bd64-0ed5614fea65.png" ></div>
<div style="text align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Figure2: Signup page</div>
<br>
The availability of the username and email are checked because each player must have a special username and email and it is not possible to register with them again.



* The file [SignUpDB.php](https://github.com/RanaMHM/ProjectCS438/blob/main/SignUpDB.php) contains PHP codes that receive the incoming data through AJAX and verify the database after verifying that the username and mail are not taken from other players, a query is made to add a new user to the database. Taken The page will be reloaded again to enter a username and email that was not taken


```
 if(isset($_POST['email'])){       
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $query = "SELECT `Email` FROM `players` WHERE `Email` = '$email'";     
        $result = mysqli_query($connection,$query);   
        $response1 = "<span style='color: green; font-size:smaller;'>Available</span>";
        if(mysqli_num_rows($result)){
           $row = mysqli_fetch_array($result);          
           $count = $row['Email'];
           if($count > 0 ){
            $response1 = "<span style='color: red; font-size:smaller;'>Not Available.</span>";
        }
        }
        echo $response1;
       // die;
    }


```
The code shows receiving the data (email) sent through JavaScript and verifying that it was not taken, then sending the speech that will appear to the user as available or unavailable on the login page.

<img width="411" alt="SignupAva" src="https://user-images.githubusercontent.com/52053143/167227230-c6464964-733b-4c87-9560-ef2de65b30de.png">

<br><hr>

### Sign in
<br>


The username and password are entered on the login page, which is built in the [htmlSignIn.php](https://github.com/RanaMHM/web-game/blob/main/SignIn/htmlSignIn.php) file in the entry box for each of them, and then the login button is pressed. The data will be sent to the [SignInDB.php](https://github.com/RanaMHM/web-game/blob/main/SignIn/SignInDB.php) file to verify that the user name and password match the data in the database for the same user.
