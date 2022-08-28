<?php 
    include "condb.php";

    $pro_name = $_POST['pro_name'];
    $type_id = $_POST['type_id'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];

    // Upload image 
    if(is_uploaded_file($_FILES['image']['tmp_name'])){
        $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
        $image_upload_path = "./image/".$new_image_name;
        move_uploaded_file($_FILES['image']['tmp_name'],$image_upload_path);
    }else{
        $new_image_name = "";
    }

    $sql = "INSERT INTO product (pro_name,type_id,price,amount,image) 
            VALUES 
            ('$pro_name','$type_id','$price','$amount','$new_image_name')";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
        echo "<script>window.location='show_product.php';</script>";
    }else{
        echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ');</script>";
    }
    mysqli_close($conn);
?>