<?php
include "condb.php";

$pro_id = $_POST['pro_id'];
$pro_name = $_POST['pro_name'];
$type_id = $_POST['type_id'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$image = $_POST['image_old'];

// Update
$sql = "UPDATE product SET pro_name='$pro_name', type_id='$type_id', price='$price', amount='$amount' WHERE pro_id='$pro_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>alert('Update ข้อมูลสำเร็จ');</script>";
    echo "<script>window.location='show_product.php';</script>";
} else {
    echo "<script>alert('Update ข้อมูลไม่สำเร็จ');</script>";
}
// Update Image 
if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    // ลบไฟล์เก่าออก
    @unlink("image/" . $_POST["image_old"]);
    $new_image_name = 'pro_' . uniqid() . "." . pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./image/" . $new_image_name;
    move_uploaded_file($_FILES['image']['tmp_name'], $image_upload_path);

    $sql = "UPDATE product SET image='$new_image_name' WHERE pro_id='$pro_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Update ข้อมูลสำเร็จ');</script>";
        echo "<script>window.location='show_product.php';</script>";
    } else {
        echo "<script>alert('Update ข้อมูลไม่สำเร็จ');</script>";
    }
}
mysqli_close($conn);
