<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Singup Form</title>
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
      
        <li class="nav-item">
          <a class="nav-link" href="admindashboard.php">Admin Dashboard</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="adminproduct.php">User Details</a>
        </li>
        <li class="nav-item nav-pills">
          <a class="nav-link active text-light" href="adduser.php">Add user</a>
        </li>
        
      </ul>
      <li class="nav">
          <a class="nav-link ms-auto" aria-current="page" href="logout.php">logout</a>
        </li>
      
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
   

  <h2>Add User</h2>
  <form calss="card" action="adduser.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input name="name" type="name" class="form-control" id="name" placeholder="Enter name" onkeyup="nameValid(this)">
      <div  id="name_error"  class="text-danger"></div>
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input name="password" type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input name="email" type="email" class="form-control" id="email" placeholder="Enter name" onkeyup="emailValidat(this)">
      <div  id="email_error" class="text-danger"></div>
    </div>
    <div class="mb-3">
      <label for="phone">Phone Number:</label>
      <input name="phone" type="text" class="form-control" id="phone" maxlength="10" placeholder="Enter phone Number" onkeyup="phoneValidat(this)">
      <div  id="phone_error" class="text-danger"></div>
    </div>
    <div class="mb-3 mt-3">
      <label for="address">Address:</label>
      <input name="address" type="text" class="form-control" id="address" placeholder="Enter address" >
    </div>
    <div class="mb-3">
      <label for="pin">Pincode:</label>
      <input name="pin" type="text" class="form-control" id="pin" placeholder="Enter pincode"  onkeyup=" pinValidat(this)">
      <div  id="pin_error" class="text-danger"></div>
    </div>


    <div><p class="text-danger"><?php echo $error;?></p></div>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

    <?php 
    include 'connect.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $pin=$_POST['pin'];
    

    if(empty($name OR $password OR $email OR $phone OR $address OR $pin )){
        header("location: adduser.php?error=ALL FIELDS ARE MANDATORY");
        exit();
    }
    if($name){
        $pattern="/^[a-zA-z +$]/";
        if(!$pattern){
            header("location: adduser.php?error=Name have only alphabet & space only");
            exit();
        }
    }
    if($email){
            $pattern=filter_var($email,FILTER_VALIDATE_EMAIL);
            if(!$pattern){
                header("location: adduser.php?error= Enter valide Email");
                exit();
            }
   if($phone<10){

    header("location: adduser.php?error=Enter 10 digit Phone Number");
    exit();
   }else {
$status=1;
    $sql="INSERT INTO users (name,password,email,phoneNumber,address,pincode,verify_status) VALUES ('$name','$password','$email','$phone','$address','$pin','$status')";
    $result=mysqli_query($con,$sql);
    
    if($result){
     
            header("location:adminuser.php");
            exit();

        }else{
            
            header("location: adduser.php?error=user not able to add");
            mysqli_error($result);

        }
    }             
    } 
            }
        
?>
  </form>
</div>
<script src="validation.js"></script>
</body>
</html>