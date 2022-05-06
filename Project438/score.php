
<!DOCTYPE html>
<html>
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <meta charset="utf-8" />
    <style>
    html, body {
        margin: 0;
        padding: 0;
        background-repeat: no-repeat; 
        background-image: url(background.gif);
   /* background-color: #2b85c1;*/
    background-repeat: no-repeat;
    background-size:100%;
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

 #gmeOver2{
  
  position:absolute;
  font-style: italic;
  font-family: 'Press Start 2P', cursive;
  font-size: 50px;
  font-weight: bolder;
  width: 800px;
  height: 510px;
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
p{
  display: none;
}
h1{
    text-align: center;
  font-size: 20px;
  font-family: 'Courier New', Courier, monospace; 
}
.playagain{
  height: 50px;
  width: 200px;
  background-color: white;
  opacity: 0px;
  font-weight: bolder;
  font-family: 'Press Start 2P', cursive;
}

button{
    margin-top: 0px;
    height: 60px;
    width : 500px;
    font-size: 30px;
    font-weight: bolder;
    font-family: 'Press Start 2P', cursive;
    box-shadow: 20px 20px 50px rgb(11, 9, 9);
    border: inset; 
}
      </style>
  </head>
  <body> 
  <?php if (isset($_GET['username'])) { $username=$_GET['username']; ?>
    <input type="hidden" id="username" name="username" value="<?php echo $username ?>"> 
    <?php } ?>
    <?php if (isset($_GET['p1'])) { $score=$_GET['p1']; ?>
    <input type="text" id="p1" name="p1" value="<?php echo $score ?>"> 
    <?php } ?>
    
   
    <div class ="box " id="gmeOver2">Game Overs
      <table>
      <tr> 
        <h1  name="score" id="score">Your Score:</h1>      
        <div id="Bscore" name="Bscore" class="Bscore" style="text-align:left; font-size:30px;"> </div> 
        
      </table>
      <div class="highestScore" id="output">     
       <table>
         <tr> 
           <td colspan="2"> <h2> Highest score:</h2></td>
         </tr>
         <?php  
                 $connection = new mysqli('localhost','root','','projectcs438');
                 if($connection->connect_error){
                     die('Connection Faild :'.$connection->connect_error);
                 }else{ 

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
 </div>
              
      </body>
     
</html>
