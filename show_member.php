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
    <title>ShowMember</title>

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
                <h3 class="text-center">แสดงข้อมูลสมาชิก</h3>
                <a href="add_member.php" class="btn btn-primary btn-sm">+ เพิ่มข้อมูล</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>รหัส</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "condb.php";

                        $sql = "SELECT * FROM member";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["surname"]; ?></td>
                                <td><?php echo $row["telephone"]; ?></td>
                                <td>
                                    <a href="edit_member.php?id=<?php echo $row["id"]; ?>" class="btn btn-success btn-sm">แก้ไข</a>
                                </td>
                                <td>
                                    <a href="delete_member.php?id=<?php echo $row["id"]; ?>"onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่ ?');" class="btn btn-danger btn-sm">ลบ</a>
                                </td>
                            </tr>
                        <?php }
                        mysqli_close($conn); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>