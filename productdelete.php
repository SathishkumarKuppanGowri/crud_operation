<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from product where id='$id'";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo 'Deleted success';
        header('location:adminproduct.php');
    }else{
        die(mysqli_error($result));
    }
}

?>