<nav class="navbar navbar-expand-lg"  style="background-color: #F39C12;">
    <div class="container">
        <a class="navbar-brand" href="#">ระบบสินค้า</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="all_product.php">สินค้า</a>
                </li>
            </ul>
            <form action="all_product.php" method="POST" class="d-flex" role="search">
                <input class="form-control me-2" name="keyword" type="search" placeholder="ค้นหา..." aria-label="Search">
                <button class="btn btn-primary" type="submit">ค้นหา</button>
            </form>
        </div>
    </div>
</nav>