<?php 

 //database connection
 $connection = new mysqli('localhost','root','','projectcs438');
 if($connection->connect_error){
     die('Connection Faild :'.$connection->connect_error);
 }else{
 //with Ajax
    if(isset($_POST['txt'])){
        $txt = mysqli_real_escape_string($connection,$_POST['txt']);
        $qurey = "SELECT `Username` FROM `players` WHERE `Username` = '$txt'";
     
        $result = mysqli_query($connection,$qurey);
        
        $response ="<span style='color: green; font-size:smaller;'>Available</span>";
        
        if(mysqli_num_rows($result)){
           $row = mysqli_fetch_array($result);
     
           $count = $row['Username'];
           if($count > 0 ){
               $response ="<span style='color: red;'>Not Available.</span>";
        }
        }
     
        echo $response;
        
    }
   

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
  
    if(isset($_POST['signup']))
    {
       if($response === "<span style='color: green; font-size:smalle;'>Available</span>" && $response1 === "<span style='color: green; font-size:smaller;'>Available</span>"){
       $username = $_POST['txt'];
       $email = $_POST['email'];
       $password = md5($_POST['password']); 
   
      //insert the user into the database.
   
     $sql = "INSERT INTO `players`(`Username`, `Email`, `Scores`, `password`, `ID`) VALUES ('$username','$email','0','$password','')";   
   
       if (mysqli_query($connection, $sql)) {
           echo "The data sent successfuly" . "<br>";
           header("Location: http://localhost/P5/index.html");
           exit();
           } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($connection) . "<br>";
           }
   
        }
        else{
            header("Location: http://localhost/P5/htmlSignIn.php");
        }
        }

    }

    ?>