# web-game
project for course (cs346) web development
* **about the game : We developed a game about a boy who rides the waves (surfer) and the goal of the game is to avoid obstacles (the sharks) and achieve the highest possible score by surviving as long as possible.**<br>
 * **The way the game works: when the player is new, the first score he achieves is stored in the database and after he plays again and achieves a higher score , the previous score is replaces by the current one if it is higher  , if not The score remains the same, and so on, the highest score achieved by the players are stored in the database and displayed in the scoreboard** <br>
* **User authentication( create a user account and then user can login the game )**<br>
The method of creating a new account and logging in to the player has been explained here : [SignIn](https://github.com/rahaf-fahad/web-game/tree/main/SignIn) <br>

* **Save the score of the user to the database** <br>
<br>

* **Show the heights score of all players at the end  of each game.** <br>
<hr>
<h3> If you are a new player, you must register and log in to play <h3>
<h3> If you already have an account, log in <h3>
   
   ![Screenshot (287)](https://user-images.githubusercontent.com/96161183/167268802-f9845623-0078-4d56-b114-8559a816987b.png)

<br><br>
<h4>After being logged in, the game starts by pressing any button</h4>
<h4>The boy surfing appears and he must avoid the sharks</h4>'
<br>

   https://user-images.githubusercontent.com/52053143/167233115-88de026b-4062-4e7a-a9bc-24605594e67d.mp4  
   
   <br> <br>
   
   ## Save the score of the player to the database
   
   When the game starts, the score will start to increase until the child hits the shark     <br>
   

    
   

 ```
    for (let sh of Sharks) {
       sh.move();
       sh.show();
        if(!BOY.hits(sh)){
                Bscore++;}
        if (BOY.hits(sh)) {
      
            Sgame.pause();
            SgameOver.play();
            Gover.style.display="block";
      
      // ------Send score to index.php and submit form ----------
            document.getElementById("Bscore").innerHTML= Bscore ;
            document.getElementById("p1").value = Bscore;
            var username = document.getElementById('username').value;
            document.getElementById("username").value = username ;
            document.getElementById("f1").submit();
            clearInterval(K);
             noLoop();

      }
      text('YOUR SCORE: ' + Bscore, width - 800, height / 9);
      BOY.show();
      BOY.move();
     }
    }
```
 
 <br>

  
  The previous code shows that when the child hits the shark, the game will stop and the scoers will be sent to [index.php](https://github.com/rahaf-fahad/web-game/blob/main/Project438/index.php), with a submit for the form by sending the username and the scores of the game to the file [ScoreDB.php](https://github.com/rahaf-fahad/web-game/blob/main/Project438/ScoreDB.php) 

 <br>
 
 ```
 // Was the score sent from javascript to index.php
   if (isset($_POST['p1'])) {
    $score = $_POST['p1'];
    $username= $_POST["username"];
 
    $sql = "SELECT `Scores` FROM `players` WHERE `Username` = '$username' ";
    $result = mysqli_query($connection,$sql);
        
    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        
     // ---- comparison betweeen the previous score saved in the database and the new score -------
        if ($row['Scores'] > $score) {
          header("Location: http://localhost/Project438/score.php?username=$username&Score=$score");
        }else{
           
       $sql2 = "UPDATE `players`  SET `Scores`= '$score' WHERE `Username`= '$username'";
       
       ......
   
       }
      }
    }
 }
 
 ```
 
  <br>


 ## Show the heights score of all players at the end  of each game.
 
  <br>
  
 After completing the comparison and saving the new [score.php](https://github.com/rahaf-fahad/web-game/blob/main/Project438/score.php), the page will direct us to the score page, in which the scores of all players will be displayed in order from highest to lowest with a button to choose to play again <br>
 
 <br> 
 

https://user-images.githubusercontent.com/52053143/167234141-2af7b30d-1377-4c6d-a68f-95264b014bab.mp4

<br>

### Code to show usernames with their score and a query from the database in the order of the score in descending order and formatted in the table with html 

<br>

 ```
<div class="highestScore" id="output">     
       <table>
         <tr> 
           <td colspan="2"> <h2> Highest score:</h2></td>
         </tr>
         <?php  
              ...
                    $query="SELECT `Username`, `Scores` FROM `players` ORDER BY `Scores` DESC "; 
                    $result= mysqli_query($connection , $query);   
                   if (mysqli_num_rows($result) > 0) {
                     $sn=1;
                     while($rows=mysqli_fetch_assoc($result)) {
                    ?>
                   <tr>                
                    <td><?php echo $rows['Username']; ?></td>
                    <td  style="text-align:center;"><?php echo $rows['Scores']; ?></td>
                  </tr>
                  <?php $sn++;}} else { ?>
                  <tr>
      <td colspan="2">No data found</td>
     </tr>
           <?php }}  ?>
           </table>     
  </div>
  <button onclick="history.back()">Play again</button>
  ...
  
  
 ```
