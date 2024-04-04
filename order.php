<?php
session_start();
include "connect.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
   
  $sql="SELECT * FROM product WHERE id='$id'";

  $result=mysqli_query($con,$sql);
 
  if($result){
    
      while($row=mysqli_fetch_assoc($result)){
          $id=$row['id'];
          $Name=$row['Name'];
          $Description=$row['Description'];
          $Image=$row['Image'];
          $Price=$row['Price'];
          $sql="INSERT INTO orders (id,name,image,price) VALUES ('$id','$Name','$Image','$Price')";
          
          $result=mysqli_query($con,$sql);
          if($result){

            
            echo "<script>alert('Your order is placed successfully');window.location='userdashboard.php';</script>";

          }else{
            echo "<script>alert('Your order already placed ');window.location='userdashboard.php';</script>";

          }
          
          
      }
  }
}
    
       
     
    
?>