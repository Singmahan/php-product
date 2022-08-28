<?php 
    include "condb.php";

    $id = $_GET['id'];
    $sql = "DELETE FROM member WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
        echo "<script>window.location='show_member.php';</script>";
    }else{
        echo "<script>alert('ลบข้อมูลไม่สำเร็จ');</script>";
    }
    mysqli_close($conn);
?>