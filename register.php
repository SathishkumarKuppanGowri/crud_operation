
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify</title>
</head>
<body>
   
    
</body>
</html>
<?php 
 include 'connect.php';
 
// Verify the email using the code from the URL
if (isset($_GET['verify_token'])) {
    $verificationCode = $_GET['verify_token'];
   
    $sql="SELECT * FROM users where verify_token='$verificationCode'";
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)){
        $row=mysqli_fetch_assoc($result);
        $id=$row['id'];
        
       
        $sql="update users set verify_status='1' where id='$id' ";
        $result=mysqli_query($con,$sql);
        if($result){
            echo " verification success.";
        }else{
            echo " NOt verification .";
        }
         
    
    }

    
} else {
    echo "Invalid verification code.";
}
?>



