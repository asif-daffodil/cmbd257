<?php
require_once '../header.php';
require_once '../components/navbar.php';
?>
<img src="../assets/images/banner.webp" alt="" class="img-fluid w-100" style="height: 80vh; object-fit: cover;">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center py-5 display-6">
            All Products
        </div>
    </div>
    <div class="row">
        <?php
        $getProducts = $conn->query("SELECT * FROM `products`");
        while ($product = $getProducts->fetch_assoc()) {
        ?>
            <div class="col-md-3 p-2">
                <div class="card h-100">
                    <img src="../assets/images/products/<?= $product['image'] ?>" alt="" class="img-fluid p-3" style="height: 200px; object-fit: scale-down">
                    <div class="card-body">
                        <h5><?= $product['name'] ?></h5>
                        <p><?= $product['description'] ?></p>
                        <h6>$<?= $product['price'] ?></h6>
                        <a href="./product.php?id=<?= $product['id'] ?>" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php
require_once '../footer.php';
?>