<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
       
        <li class="nav-item nav-pills">
          <a class="nav-link active text-light" href="admindashboard.php">Admin Dash board</a>
        </li>
        
      </ul>
      <li class="nav">
          <a class="nav-link ms-auto" aria-current="page" href="logout.php">logout</a>
        </li>
      
    </div>
  </div>
</nav>
<div class="container d-flex justify-content-center  m-5 p-5 ">
    <div class="card m-5 border p-5">
      <div class="card-top m-auto">
        <h3>Product</h3>
      </div>
      <div class="card-body m-auto">
      <i class="fa fa-shop"></i>
      </div>
      <div class="card-buttom m-auto">
      <a href="adminproduct.php" class="btn btn-primary">Details</a>
      </div>
        
        
    </div>
    <div class="card m-5 border p-5">
      <div class="card-top m-auto">
        <h3>User</h3>
      </div>
      <div class="card-body m-auto">
      <i class="fa fa-users-rays"></i>
      </div>
      <div class="card-buttom m-auto">
      <a href="adminuser.php" class="btn btn-primary">Details</a>
      </div>
        
        
    </div>
    
</div>
    
</body>
</html>