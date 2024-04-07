
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Singup Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<div class="container mt-3">
    <?php

    $error='';
    if(isset($_GET['error'])){
        $error=$_GET['error'];
    }
    
    ?>
  <h2>User Registration Form</h2>
  <form calss="card" action="usersignup.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input name="name" type="name" class="form-control" id="name" placeholder="Enter name" onkeyup="nameValid(this)">
      <div  id="name_error"  class="text-danger"></div>
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input name="password" type="password" class="form-control" id="pwd" placeholder="Enter password" >
      <div  id="pass_error" class="text-danger"></div>
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input name="email" type="email" class="form-control" id="email" placeholder="Enter name" onkeyup="emailValidat(this)" >
      <div  id="email_error" class="text-danger"></div>
    </div>
    <div class="mb-3">
      <label for="phone">Phone Number:</label>
      <input name="phone" type="text" class="form-control" id="phone" maxlength="10" placeholder="Enter phone Number" onkeyup="phoneValidat(this)" >
      <div  id="phone_error" class="text-danger"></div>
    </div>
    <div class="mb-3 mt-3">
      <label for="address">Address:</label>
      <input name="address" type="text" class="form-control" id="address" placeholder="Enter address" >
    </div>
    <div class="mb-3">
      <label for="pin">Pincode:</label>
      <input name="pin" type="text" class="form-control" id="pin" placeholder="Enter pincode" maxlength="10" onkeyup=" pinValidat(this)">
      <div  id="pin_error" class="text-danger"></div>
    </div>

    <p> If you  hava account pleace <a href="userlogin.php">SigIn</a></p>
    <div><p class="text-danger"><?php echo $error;?></p></div>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

    <?php 
    
    // Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to PHPMailer autoload.php file
// Function to send verification email
function sendVerificationEmail($email, $verificationCode) {
  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
      // Server settings
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'sathishkumark2898@gmail.com';                     // SMTP username
      $mail->Password   = 'lxef xlht fptr kfpq';                        // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      // Recipients
      $mail->setFrom('sathishkumark2898@gmail.com', 'Sathishkumar');
      $mail->addAddress($email);                                  // Add a recipient

      // Content
      $mail->isHTML(true);                                        // Set email format to HTML
      $mail->Subject = 'Email Verification';
      $mail->Body    = 'Please click the following link to verify your email: <a href="http://localhost/task/crud_operation/verification.php?verify_token='.$verificationCode.'">Verify Email</a>';

      $mail->send();
      echo "<sript>window.alert('Verification email has been sent')</script>";
  } catch (Exception $e) {
      echo "Error sending email: {$mail->ErrorInfo}";
  }
}


   

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $pin=$_POST['pin'];
    $verificationCode=md5(rand());
    //check Empty
    if(empty($name OR $password OR $email OR $phone OR $address OR $pin )){
        header("location: usersignup.php?error=ALL FIELDS ARE MANDATORY");
        exit();
        }else{
            //name validation
            if($name){
              $pattern= preg_match('/^[a-zA-Z ]+$/', $name);
              
                if(!$pattern){
                    header("location: usersignup.php?error=Name have  alphabet space only");
                    exit();
                }else{
                       // email validation
                    if($email){
                      
                      $pattern=filter_var($email,FILTER_VALIDATE_EMAIL);
                      if(!$pattern){
                          header("location: usersignup.php?error= Enter valide Email");
                          exit();
                      }else{
                        //phone validation
                                    if($phone<10){
                                    
                                        header("location: usersignup.php?error=Enter 10 digit Phone Number");
                                        exit();
                                      }else{
                                                                        // avoid dublicate email and phone number
                                                                        include "connect.php";
                                            $query="SELECT email FROM users WHERE email='$email'  LIMIT 1";
                                            $Result=mysqli_query($con,$query);
                                                if(mysqli_num_rows($Result) > 0){
                                                 
                                        header("location: usersignup.php?error=Email ID  already Registered");
                                        exit();
                                      }else{
                                        $query="SELECT email FROM users WHERE phoneNumber='$phone'  LIMIT 1";
                                            $Result=mysqli_query($con,$query);
                                                if(mysqli_num_rows($Result) > 0){
                                                 
                                        header("location: usersignup.php?error=Phone NUmber already Registered");
                                        exit();
                                      }else{
                                        //insert data
                                      
                                        $sql="INSERT INTO users (name,password,email,phoneNumber,address,pincode,verify_token) VALUES ('$name','$password','$email','$phone','$address','$pin','$verificationCode')";
                                        $result=mysqli_query($con,$sql);
                                        
                                        if($result){
                                          sendVerificationEmail($email, $verificationCode); // Send verification email
                                          
                                          header("location:userlogin.php?error=Verify your email Now then log in");
                                          exit();
                              
                                      }else{
                                          
                                          header("location: usersignup.php?error=Registration Failed");
                                          mysqli_error($result);
                              
                                                }
                                      }
                                      }
                               
                      }
                  }
                    }
                    }

            }
          }
}
?>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="validation.js"></script>
</div>
</body>
</html>