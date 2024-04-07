<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        <li class="nav-item nav-pills">
          <a class="nav-link active text-light" href="adminproduct.php">User Details</a>
        </li>
        
      </ul>
      <li class="nav">
          <a class="nav-link ms-auto" aria-current="page" href="logout.php">logout</a>
        </li>
      
    </div>
  </div>
</nav>
<div class="container my-5 py-5">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item nav-pills w-50">
          <a class="nav-link active text-center text-light" aria-current="page" href="adduser.php">Add user</a>
        </li>
        <li class="nav-item mt-2 ">
        <form class="d-flex" action="adminuser.php" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        
       
      </form>

        </li>
        
        
      </ul>
      <table class="table">
    <thead>
    
    <tr class="scope">
        <th>Id</th>
        <th>Name</th>
        <th>Emain</th>
        <th>Password</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Edit</th>
        <th>status</th>
    </tr>
    </thead>
    <tbody>
<?php
include 'connect.php';

if (isset($_GET['search'])) {
  $search_query = $_GET['search'];
  

  // Perform a basic search in the 'title' and 'content' columns
  $sql = "SELECT * FROM users WHERE name LIKE '%$search_query%' OR email LIKE '%$search_query%' OR phoneNumber LIKE '%$search_query% '";
  $result = mysqli_query($con,$sql);

  if (mysqli_num_rows($result)>0) {
      // Display search results
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $password=$row['password'];
        $Phonenumber=$row['phoneNumber'];
        $address=$row['address'];
        $status=$row['verify_status'];
        
        if($status !=0){
          $user_status="Enable";
          $link="disable";
          $color="btn btn-success";

        }else{
          $user_status="Disable";
          $link="enable";
          $color="btn btn-danger";
        }
          echo '<tr >
        <td>'.$id.'</td>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$password.'</td>
        <td>'.$Phonenumber.'</td>
        <td>'.$address.'</td>
        <td>
        
        <a class= "btn btn-danger" href="usedelete.php?deleteid='.$id.'">Delete</a>
        
        </td>
        
        <td><a href="'.$link.'.php?id='.$id.'" class="'.$color.'">'.$user_status.'</a></td>
    </tr>';
        
        
       
        
    }
}else{
  echo 'please enter data';
}

}else{
  $sql = "SELECT * FROM users";
  $result = mysqli_query($con,$sql);
  

  if (mysqli_num_rows($result)>0) {
      // Display search results
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $password=$row['phoneNumber'];
        $Phonenumber=$row['address'];
        $address=$row['pincode'];
        $status=$row['verify_status'];

        if($status !=0){
          $user_status="Enable";
          $link="disable";
          $color="btn btn-success";

        }else{
          $user_status="Disable";
          $link="enable";
          $color="btn btn-danger";
        }
        
        echo '<tr >
        <td>'.$id.'</td>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$password.'</td>
        <td>'.$Phonenumber.'</td>
        <td>'.$address.'</td>
        <td>
        
        <a class= "btn btn-danger"href="usedelete.php?deleteid='.$id.'">Delete</a>
        
        </td>
        <td><a href="'.$link.'.php?id='.$id.'" class="'.$color.'">'.$user_status.'</a></td>
    </tr>';
    }
  }
}

?>
</tbody>
</table>



</table>



</div>
<script src="validation.js"></script>  
</body>
</html>