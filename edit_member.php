<?php 
    include "condb.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM member WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

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
    <title>Document</title>

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
                <h3 class="text-center">แก้ไขข้อมูลสมาชิก</h3>
                <form action="update_member.php" method="POST">
                <label for="">รหัสสมาชิก</label>
                    <input type="id" name="id" readonly class="form-control" value="<?php echo $row["id"]; ?>">
                    <label for="">ชื่อ</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>">
                    <label for="">นามสกุล</label>
                    <input type="text" name="surname" class="form-control" value="<?php echo $row["surname"]; ?>">
                    <label for="">เบอร์โทรศัพท์</label>
                    <input type="number" name="telephone" class="form-control" value="<?php echo $row["telephone"]; ?>"><br>
                    <input type="submit" class="btn btn-primary" value="อัพเดท">
                    <a href="show_member.php" class="btn btn-danger">ยกเลิก</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>