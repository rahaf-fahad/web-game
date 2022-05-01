<?php 
 session_start(); 
 //database connection
 $connection = new mysqli('localhost','root','','projectcs438');
 if($connection->connect_error){
     die('Connection Faild :'.$connection->connect_error);
 }else{

    if(isset($_POST['login'])){
        if (isset($_POST['txt']) && isset($_POST['password'])) {
        
            function validate($data){
        
               $data = trim($data);
        
               $data = stripslashes($data);
        
               $data = htmlspecialchars($data);
        
               return $data;
        
            }
        
            $uname = validate($_POST['txt']);
        
            $pass = validate(md5($_POST['password']));
        
        
        
                $sql = "SELECT Username, password FROM players WHERE Username = '$uname' and password ='$pass'  ";
                $result = mysqli_query($connection, $sql);
        
                if (mysqli_num_rows($result) === 1) {
        
                    $row = mysqli_fetch_assoc($result);
        
                    if ($row['Username'] === $uname && $row['password'] === $pass) {
        
                        echo "Logged in!";
        
                        $_SESSION['Username'] = $row['Username'];
        
                        $_SESSION['Email'] = $row['Email'];
        
                        $_SESSION['ID'] = $row['ID'];
        
                        header("Location: index.html");
        
                        exit();
        
                    }else{
        
                        header("Location:htmlSignIn.php?error=Incorect Username or password");
        
                    }
        
                }else{
                          
                       
                   header("Location:htmlSignIn.php?error=Incorect User name or password!");
        
                    
        
                }
        
            }
        
        }else{
        
            header("Location: htmlSignIn.php");
        
            exit();
        
        }
        
        
}

    ?> 
