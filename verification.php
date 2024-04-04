
<?php 
 include 'connect.php';
 if (isset($_GET['verify_token'])) {
    
    $tokenFromLink = $_GET['verify_token'];
    $query="SELECT * FROM users WHERE verify_token='$tokenFromLink' LIMIT 1";
    $result=mysqli_query($con,$query);
  

    if($result){
        $query = "UPDATE users SET verify_status='1' WHERE verify_token='$tokenFromLink' ";
        $updated=mysqli_query($con,$query);
   
        if($updated){
         echo "you email is verifyed now Log In";
        }
     }
 }

?>