<?php
include "condb.php";

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
    <title>AddProduct</title>

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
                <h3 class="text-center">เพิ่มข้อมูลสินค้า</h3>
                <form action="insert_product.php" method="POST" enctype="multipart/form-data">
                    <label for="">ชื่อสินค้า</label>
                    <input type="text" name="pro_name" class="form-control" required>
                    <label for="">ประเภทสินค้า</label>
                    <select class="form-select" name="type_id" required>
                        <option value="">---ประเภทสินค้า---</option>
                        <?php
                        $sql = "SELECT * FROM type ORDER BY type_name";
                        $hand = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($hand)) {
                        ?>
                            <option value="<?php echo $row['type_id']; ?>"><?php echo $row['type_name']; ?></option>
                        <?php }
                        mysqli_close($conn); ?>
                    </select>

                    <label for="">ราคา</label>
                    <input type="number" name="price" class="form-control" required>
                    <label for="">จำนวน</label>
                    <input type="number" name="amount" class="form-control" required>
                    <label for="">รูปภาพ</label>
                    <input type="file" name="image" class="form-control" required><br>
                    <input type="submit" class="btn btn-primary" value="บันทึก">
                    <input type="reset" class="btn btn-danger" value="Cancel">
                </form>
            </div>
        </div>
    </div>
</body>

</html>