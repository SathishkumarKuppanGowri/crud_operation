<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin LogIn</title>
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
          <a class="nav-link active text-light" aria-current="page" href="#">Admin LogIn</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
<div class="container mt-3">
  <?php 
  $error='';
  if(isset($_GET['error'])){
    $error= $_GET['error'];
  }
  ?>
  <h2>Admin LogIn</h2>
  <form calss="card" action="adminlogin.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input name="name" type="name" class="form-control" id="name" placeholder="Enter name" >
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input name="password" type="password" class="form-control" id="pwd" placeholder="Enter password" >
    </div>
    
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    <div><p><?php echo $error;?></p></div>
  </form>

  <?php 
  include 'connect.php';
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    if(empty($name) OR empty($password)){
        
      header("location:adminlogin.php?error=Wrong credantial");
      exit();
  }else{
    $sql="SELECT * FROM admin WHERE username='$name' AND password='$password'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
      header("location:admindashboard.php");
      exit();
    }else{
      header("location:adminlogin.php?error=Non registered admin login");
    }
  }
 
  }
  ?>
</div>
    
</body>
</html>