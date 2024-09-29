<?php
require_once '../header.php';
require_once '../components/navbar.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $conn->query("SELECT * FROM `products` WHERE `id` = $id")->fetch_assoc();
    $cart = $_SESSION['cart'];
    if (isset($cart[$id])) {
        $cart[$id]['quantity'] += 1;
    } else {
        $cart[$id] = [
            'quantity' => 1,
            'product' => $product
        ];
    }
    $_SESSION['cart'] = $cart;
    // toaster with setTimeout for 2 seconds
    echo "<script>toastr.success('Item added to cart');setTimeout(()=> location.href='./cart.php', 2000)</script>";
}
?>
<?php
// remove item from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $cart = $_SESSION['cart'];
    unset($cart[$id]);
    $_SESSION['cart'] = $cart;
    // toaster with setTimeout for 2 seconds
    echo "<script>toastr.success('Item removed from cart');setTimeout(()=> location.href='./cart.php', 2000)</script>";
}

// if session cart has no item
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<div class='container'><div class='row' style='min-height: 80vh'><div class='col-md-12 text-center'><h2>No item in cart</h2></div></div></div>";
} else {
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-5">
                <h2>Cart</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sn = 1;
                        $total = 0;
                        foreach ($_SESSION['cart'] as $id => $item) {
                            $product = $item['product'];
                            $quantity = $item['quantity'];
                            $total += $product['price'] * $quantity;
                        ?>
                            <tr valign="middle">
                                <td><?= $sn++ ?></td>
                                <td><?= $product['name'] ?></td>
                                <td><img src="../assets/images/products/<?= $product['image'] ?>" style="width: 80px; height: 80px; object-fit: cover;"></td>
                                <td><?= $product['price'] ?></td>
                                <td><?= $quantity ?></td>
                                <td><?= $product['price'] * $quantity ?></td>
                                <td>
                                    <a href="./cart.php?remove=<?= $product['id'] ?>" class="btn btn-danger">Remove</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="5" class="text-end">Total</td>
                            <td><?= $total ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- checkout -->
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <a href="./checkout.php" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
<?php } ?>

<?php
require_once '../footer.php';
?>