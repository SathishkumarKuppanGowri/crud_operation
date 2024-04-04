<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
          <a class="nav-link  " aria-current="page" href="userdashboard.php">User Dashboard</a>
        </li>
        
        
      </ul>
      <li class="navbar-nav nav-pills">
          <a class="nav-link active ms-auto text-light" aria-current="page" href="Order_details.php">Orders</a>
        </li>
      <li class="nav">
          <a class="nav-link ms-auto" aria-current="page" href="userlogin.php">logout</a>
        </li>
    </div>
  </div>
</nav>
<div class="container ">



<table class="table">
    <thead>
    <tr class="">
        <th>Id</th>
        <th>Name</th>
       
        <th>Image</th>
        <th>Price</th>
       
        
        
    </tr>
    </thead>
    <tbody>
        <?php
        include 'connect.php';
        $sql="SELECT * FROM orders";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $Name=$row['name'];
                
                $Image=$row['image'];
                $Price=$row['price'];
                
                echo '<tr >
                <td>'.$id.'</td>
                <td>'.$Name.'</td>
                
                <td><img src="uploads/'.$Image.'"  width="400px" height="150px"> </td>
                <td>'.$Price.'</td>
                
               
            </tr>';
            }
        }