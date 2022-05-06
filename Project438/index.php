
<!DOCTYPE html>
<html>
  <head>
 
  <script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/p5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/addons/p5.sound.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bmoren/p5.collide2D/p5.collide2d.min.js"></script>
    <script src="https://unpkg.com/ml5@0.3.1/dist/ml5.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <meta charset="utf-8" />
    <style>
   html, body {
        margin: 0;
        padding: 0;
        background-color: white;
    
      }
      canvas {
        display:block;
        margin-left: 5px;
        
      }
      }
      #score{
    text-align: right;
    float: right;
    top: auto;
    font-size: 30px;
 }
 d{
   color: rgb(239, 43, 17);
 }
 .box {
  position:absolute;
  margin: 10%;
  width: 350px;
  height: 680px;
  float:inline-end;
  opacity: 0.9;
  background-color:rgb(19, 18, 18);
  border-radius: 5px;
  border-width: medium;
  /*border: solid;*/
    padding: 20px;
  margin-left: 15%;
    margin-top: 1.5%;
   
 }

 #gameOver{
  
  position:absolute;
  display: none;
  font-style: italic;
  font-family: 'Press Start 2P', cursive;
  font-size: 50px;
  font-weight: bolder;
  width: 800px;
  height: 450px;
  color: white;
  text-align: center;
  

}
.highestScore{
  font-family: 'Courier New', Courier, monospace;
  font-size: 10px;
  font-weight:  bold;
  color: aliceblue;
  border: solid;
  margin: 0%;
  contain: content;
  overflow-y: scroll;
  height: 300px; ;
}
#scores{
  text-align: right;
  font-weight: bold;
  padding: 5px;
  font-size: 30px;
  color: red;
}
td{
  width: 400px;
  text-align: center;
  font-size: 20px;
  
  /*border: inset;*/
  
}
tr{
    height: 50px;
}
table{
  text-align: center;
  font-size: 30px;
  font-weight: bold;
  font-family: 'Courier New', Courier, monospace;
  

}



      </style>
  </head>
  <body> 
    <form action="ScoreDB.php" action="index.php" method="POST" id="f1" > 
      <!-- ___________________________________________________________ -->
    <?php if (isset($_GET['username'])) { $username=$_GET['username']; ?>
    <input type="hidden" id="username" name="username" value="<?php echo $username ?>"> 
    <?php } ?> 
     <!-- ___________________________________________________________ -->
    <input type="hidden" id="p1" name="p1" value="">

    <div class ="box " id="gameOver">Game Overs
      <table>
      <tr> 
        <td><h1 style="text-align:right; " name="score" id="score">Your Score:</h1>      
        <td>
        <div id="Bscore" name="Bscore" class="Bscore" style="text-align:left; font-size:30px; "></div> 
        </td>
        </tr>
      </table>   
 </div>
    </form>
      </body>    
    <script src="BOY.js"></script>
    <script src="shark.js"></script>
    <script src="sketch.js"></script>
</html>
