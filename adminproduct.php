<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body><nav class="navbar navbar-expand-lg navbar-light bg-light">
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
        <li class="nav-item nav-pills">
          <a class="nav-link active text-light" href="adminproduct.php">Product Details</a>
        </li>
        
      </ul>
      <li class="nav">
          <a class="nav-link ms-auto" aria-current="page" href="logout.php">logout</a>
        </li>
      
    </div>
  </div>
</nav>
<div class="container p-5">

<a href="productadd.php"class="btn btn-primary"> Add Product </a>
<form class="d-flex m-1" action="adminproduct.php" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Search product name" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        
       
      </form>


<table class="table">
    <thead>
    <tr class="">
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Price</th>
        <th>Customice</th>
        
    </tr>
    </thead>
    <tbody>
        <?php
        
       include 'connect.php';
       if(isset($_GET['search'])){
  
        $search=$_GET['search'];
        
        $sql="SELECT * FROM product WHERE Name like '%$search%'";
      
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $Name=$row['Name'];
                $Description=$row['Description'];
                $Image=$row['Image'];
                $Price=$row['Price'];
                
                echo '<tr >
                <td>'.$id.'</td>
                <td>'.$Name.'</td>
                <td>'.$Description.'</td>
                <td><img src="uploads/'.$Image.'"  width="400px" height="150px"> </td>
                <td>'.$Price.'</td>
                <td><a href="order.php?id='.$id.'">Order</a></td>
                
               
            </tr>';
            }
        }
      
      }else{
        $sql="SELECT * FROM product";
        $result=mysqli_query($con,$sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $Name=$row['Name'];
                $Description=$row['Description'];
                $Image=$row['Image'];
                $Price=$row['Price'];
                
                echo '<tr >
                <td>'.$id.'</td>
                <td>'.$Name.'</td>
                <td>'.$Description.'</td>
                <td><img src="uploads/'.$Image.'"  width="400px" height="150px"> </td>
                <td>'.$Price.'</td>
                
                <td>
                <a class= "btn btn-primary"href="productupdat.php?updateid='.$id.'">Update</a>
                <a class= "btn btn-danger"href="productdelete.php?deleteid='.$id.'">Delete</a>
                </td>
            </tr>';
            }
        }
        
      }
        
        ?>


    </tbody>
</table>
</body>
</html>
