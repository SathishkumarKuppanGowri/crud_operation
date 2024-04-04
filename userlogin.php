<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User LogIn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Jayam Web Solutions</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item ">
          <a class="nav-link " aria-current="page" href="1.index.php">Home</a>
        </li>
        <li class="nav-item nav-pills">
          <a class="nav-link active text-light" aria-current="page" href="#">User LogIn</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
<div class="container mt-3">
  <?php
  $error='';
  if(isset($_GET['error'])){
    $error=$_GET['error'];
  }
  ?>
  <h2>User LogIn</h2>
  <form calss="card" action="userlogin.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="name">Email:</label>
      <input name="email" type="email" class="form-control" id="name" placeholder="Enter email" >
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input name="password" type="password" class="form-control" id="pwd" placeholder="Enter password" >
    </div>
    <p> If you dont't hava account pleace <a href="usersignUp.php">SignUP</a></p>
    <div>
      <p><?php echo $error;?></p>
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    <?php 
  include 'connect.php';
  if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(empty(($email)) OR empty(($password))){
        
      header("location:userlogin.php?error=Wrong credantial");
      exit();
  }else{
    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
      $row=mysqli_fetch_assoc($result);
      $email=$row['email'];
      $status=$row['verify_status'];
      if($check=($status!=0)){
        
        header("location:userdashboard.php");
        exit();
      }
   else{
        header("location:userlogin.php?error=Need email verification");
        exit();
       }
      
    }else{
      header("location:userlogin.php?error=Non registered user login");
      exit();
    }
  }
 
  }
  ?>

  </form>
</div>
    
</body>
</html>