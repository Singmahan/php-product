<?php 
    include "condb.php";

    $pro_id = $_GET['pro_id'];
    $sql = "DELETE FROM product WHERE pro_id='$pro_id'";
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
        echo "<script>window.location='show_product.php';</script>";
    }else{
        echo "<script>alert('ลบข้อมูลไม่สำเร็จ');</script>";
    }
    mysqli_close($conn);
?>