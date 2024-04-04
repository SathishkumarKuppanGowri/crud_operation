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
          <a class="nav-link " href="adminproduct.php">Product Details</a>
        </li>
        <li class="nav-item nav-pills">
          <a class="nav-link active text-light" href="adminproduct.php">Product add</a>
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
    
  <h2>Add Product Details:</h2>
  <form calss="card" action="productadd.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="name">Product Name:</label>
      <input name="name" type="name" class="form-control" id="name" placeholder="Enter name" >
    </div>
    <div class="mb-3">
      <label for="text">description:</label>
      <input name="desc" type="text" class="form-control" id="text" placeholder="Enter password" >
    </div>
    <div class="mb-3 mt-3">
      <label for="image">Image:</label>
      <input name="image" type="file" class="form-control" id="file" placeholder="UPLOAD IMAGE" accept=".jpg, .jpeg, .png"  >
    </div>
    <div class="mb-3">
      <label for="price">Price:</label>
      <input name="price" type="text" class="form-control" id="phone" placeholder="Enter password" >
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
        $folder='uploads/'.$filename;
      
        $price=$_POST['price'];
        if(empty($name) OR empty($desc) OR empty($filename) OR empty($price) ){
            header("location: productadd.php?error=All Fileds are Must Filled");
            exit();
        }
        if($filesize > 1048576){
          header("location:productadd.php?error=You can not upload this file only allow lessthan 1mb");
          exit();
        }else{
        $sql="INSERT INTO product (Name,Description,Image,Price) VALUES ('$name','$desc','$filename',$price)";
        $result=mysqli_query($con,$sql);
        if(move_uploaded_file($tmp_name,$folder)){
          
            header("location: adminproduct.php");
        }else{
            header("location: productadd.php?error=something error..!");
          
        }
    }

    }
    ?>
</div>
</body>
</html>