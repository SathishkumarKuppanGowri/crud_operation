<?php
include "connect.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="UPDATE users SET verify_status=1 where id='$id'";
    $result=mysqli_query($con,$sql);
    if($result){
        header("location:adminuser.php");
        exit();
    }
}

?>