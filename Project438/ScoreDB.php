<?php
 $connection = new mysqli('localhost','root','','projectcs438');
 if($connection->connect_error){
     die('Connection Faild :'.$connection->connect_error);
 }else{
  
  if (isset($_POST['p1'])) {
    $score = $_POST['p1'];
    $username= $_POST["username"];
 
    $sql = "SELECT `Scores` FROM `players` WHERE `Username` = '$username' ";
    $result = mysqli_query($connection,$sql);
        
    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        if ($row['Scores'] > $score) {
          header("Location: http://localhost/Project438/score.php?username=$username&Score=$score");
        }else{
           
       $sql2 = "UPDATE `players`  SET `Scores`= '$score' WHERE `Username`= '$username'";
       
      if ($connection->query($sql2) === TRUE) {
        header("Location: http://localhost/Project438/score.php?username=$username&Score=$score");
          //echo "Record updated successfully";
                     }else { 
                      header("Location: http://localhost/Project438/score.php?username=$username&Score=$score");
           //echo "Error updating record: " . $connection->error;
       }
      }
    }
 }
 }
?>