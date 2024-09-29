<?php
require_once '../header.php';
require_once '../components/navbar.php';
$id = $_GET['id'];
$product = $conn->query("SELECT * FROM `products` WHERE `id` = $id")->fetch_assoc();

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 text-end">
            <img src="../assets/images/products/<?= $product['image'] ?>" alt="" class="img-fluid p-3" style="height: 400px; object-fit: scale-down">
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h1><?= $product['name'] ?></h1>
            <p><?= $product['description'] ?></p>
            <h3>$<?= $product['price'] ?></h3>
            <a href="./cart.php?id=<?= $product['id'] ?>" class="btn btn-primary" style="width:180px">Add to cart</a>
        </div>
    </div>
</div>
<?php
require_once '../footer.php';
?>