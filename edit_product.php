<?php
include "condb.php";

$pro_id = $_GET['pro_id'];

$sql = "SELECT * FROM product WHERE pro_id='$pro_id'";
$result = mysqli_query($conn, $sql);
$row_pro = mysqli_fetch_array($result);

// Type_product 
// $product_type = $row_pro['type_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=K2D&family=Noto+Sans+Thai&family=Prompt:wght@200;400;500&family=Roboto:wght@500&family=Sarabun:wght@500&display=swap" rel="stylesheet">
    <title>EditProduct</title>

    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">แก้ไขข้อมูลสินค้า</h3>
                <form action="update_product.php" method="POST" enctype="multipart/form-data">
                    <label for="">รหัสสินค้า</label>
                    <input type="text" name="pro_id" readonly class="form-control" value="<?php echo $row_pro['pro_id']; ?>">
                    <label for="">ชื่อสินค้า</label>
                    <input type="text" name="pro_name" class="form-control" value="<?php echo $row_pro['pro_name']; ?>">
                    <label for="">ประเภทสินค้า</label>
                    <!-- Edit Type Product  -->
                    <?php 
                        $q = "SELECT * FROM type";
                        $result = mysqli_query($conn, $q);
                    ?>
                    <select class="form-select" name="type_id" required>
                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            if ($row[0] == $row_pro['type_id']) {
                                echo "<option value='$row[0]' selected>$row[1]</option>";
                            } else {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                        } ?>
                    </select>

                    <label for="">ราคา</label>
                    <input type="number" name="price" class="form-control" value="<?php echo $row_pro['price']; ?>">
                    <label for="">จำนวน</label>
                    <input type="number" name="amount" class="form-control" value="<?php echo $row_pro['amount']; ?>"><br>
                    
                    <label for="">รูปภาพ</label><br><br>
                    <img src="image/<?php echo $row_pro['image']; ?>" width="150px" height="150px"><br><br>
                    <input type="file" name="image" class="form-control"><br>
                    <input type="hidden" name="image_old" class="form-control" value="<?php echo $row_pro['image']; ?>">
                    
                    <input type="submit" class="btn btn-primary" value="อัพเดท">
                    <a href="show_product.php" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>