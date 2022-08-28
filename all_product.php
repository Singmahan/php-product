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
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>all_product</title>
    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>
    <div class="container mt-5">
        <div class="row">
            <?php
            include "condb.php";

            // คำสั่งแบ่งหน้าข้อมูล
            $perpage = 8;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $start = ($page - 1) * $perpage;

            // คำสั่งแสดงข้อมูลและค้นหาข้อมูล

            $keyword = @$_POST['keyword'];
            if ($keyword != "") {
                $sql_product = "SELECT * FROM product WHERE pro_id='$keyword' or pro_name LIKE '%$keyword%' ORDER BY pro_id limit {$start},{$perpage}";
            } else {
                $sql_product = "SELECT * FROM product ORDER BY pro_id limit {$start},{$perpage}";
            }

            $result = mysqli_query($conn, $sql_product);
            while ($row_product = mysqli_fetch_array($result)) {
                $price = $row_product['price'];
            ?>
                <div class="col-md-3" align="center">
                    <img src="image/<?php echo $row_product['image']; ?>" width="200" height="250"><br>
                    ID Product : <?php echo $row_product['pro_id']; ?><br>
                    <?php echo $row_product['pro_name']; ?><br>
                    ราคา : <?php echo number_format($price); ?> บาท <br>
                    <a href="#" class="btn btn-primary btn-sm"> + เพิ่มลงตะกร้าสินค้า</a><br><br>
                </div>

            <?php
            }
            // mysqli_close($conn); 
            ?>
        </div>

        <?php
        $sql_page = "SELECT * FROM product";
        $result_page = mysqli_query($conn, $sql_page);
        $total_record = mysqli_num_rows($result_page);
        $total_page = ceil($total_record / $perpage);
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="all_product.php?page=1">Previous</a></li>
                <?php for ($i = 1; $i <= $total_page; $i++) {  ?>
                    <li class="page-item"><a class="page-link" href="all_product.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php  } ?>
                <li class="page-item"><a class="page-link" href="all_product.php?page=<?php echo $total_page ?>">Next</a></li>
            </ul>
        </nav>
        <?php mysqli_close($conn); ?>
    </div>
</body>


</html>