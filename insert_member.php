<?php 
    include "condb.php";

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $telephone = $_POST['telephone'];

    $sql = "INSERT INTO member (name,surname,telephone) VALUES ('$name','$surname','$telephone')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
        echo "<script>window.location='show_member.php';</script>";
    }else{
        echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ');</script>";
    }
    mysqli_close($conn);
?>