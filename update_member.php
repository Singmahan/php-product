<?php 
    include "condb.php";

    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $telephone = $_POST['telephone'];
    
    $sql = "UPDATE member SET name='$name', surname='$surname', telephone='$telephone' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
        echo "<script>window.location='show_member.php';</script>";
    }else{
        echo "<script>alert('แก้ไขข้อมูลไม่สำเร็จ');</script>";
    }
    mysqli_close($conn);
?>