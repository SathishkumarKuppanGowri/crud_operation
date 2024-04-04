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
          <a class="nav-link " aria-current="page" href="1.index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admindashboard.php">Admin Dashboard</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="adminproduct.php">Product Details</a>
        </li>
        <li class="nav-item nav-pills">
          <a class="nav-link active text-light" href="productupdat.php">Product Update</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
    <div class="container mt-3">
        <?php
        
        $error=$uname=$udesc=$uprice='';
        if(isset($_GET['error'])){
            $error=$_GET['error'];
        }else{
          include 'connect.php';
          $id='';
       
            $id=($_GET['updateid']);
            $sql="SELECT *FROM product WHERE id='$id'";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)){
                $row=mysqli_fetch_assoc($result);
                $uname=$row['Name'];
                $udesc=$row['Description'];
                $uprice=$row['Price'];
            }
        }
       
            
        
        ?>
    
  <h2>Update Product Details:</h2>
  <form calss="card" action="#" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="name">Product Name:</label>
      <input name="name" type="name" class="form-control" id="name" value="<?php echo $uname;?>" placeholder="Enter name" >
    </div>
    <div class="mb-3">
      <label for="text">description:</label>
      <input name="desc" type="text" class="form-control" id="text" value="<?php echo $udesc;?>" placeholder="Enter password" >
    </div>
    <div class="mb-3 mt-3">
      <label for="image">Image:</label>
      <input name="image" type="file" class="form-control" id="file" placeholder="UPLOAD IMAGE" accept=".jpg,.jpeg,.png" >
    </div>
    <div class="mb-3">
      <label for="price">Price:</label>
      <input name="price" type="text" class="form-control" id="phone" value="<?php echo $uprice?>" placeholder="Enter password" >
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    <div>
        <p><?php echo $error?></p>
    </div>
    </form>
    <?php
    include 'connect.php';
    
    if(isset($_POST['submit'])){
      $name=$_POST['name'];
      $desc=$_POST['desc'];
      $filename=$_FILES['image']['name'];
      $tmp_name=$_FILES['image']['tmp_name'];
      $filesize=$_FILES['image']['size'];
      $folder=move_uploaded_file($tmp_name,"uploads/".$filename);
    
      $price=$_POST['price'];
      if(empty($name) OR empty($desc) OR empty($filename) OR empty($price) ){
          header("location: productupdat.php?error=All Fileds are Must Filled");
          exit();
          
      }
      if($filesize > 1048576){
        header("location:productupdat.php?error=You can not upload this file only allow lessthan 1mb");
        exit();
      }else{
        $sql="update product set Name='$name',Description='$desc',Image='$filename',Price='$price' where id='$id' ";
        $result=mysqli_query($con,$sql);
      
        if($result){
          
            header("location: adminproduct.php");

          
        }else{
          mysqli_connect_error($result);
            header("location: productupdat.php?error=something error..!");
          
        }
    }

    }
    
    ?>
</div>
</body>
</html>