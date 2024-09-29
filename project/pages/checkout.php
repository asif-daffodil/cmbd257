<?php
require_once '../header.php';
require_once '../components/navbar.php';
if (isset($_POST['checkoutBtn'])) {
    $name = $conn->real_escape_string(secureData($_POST['name']));
    $email = $conn->real_escape_string(secureData($_POST['email']));
    $phone = $conn->real_escape_string(secureData($_POST['phone']));
    $address = $conn->real_escape_string(secureData($_POST['address']));
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $productData) {
        $quantity = $productData['quantity'];
        $selectProductQuery = $conn->query("SELECT * FROM `products` WHERE `id` = $id");
        $product = $selectProductQuery->fetch_assoc();
        $total += $product['price'] * $quantity;
    }
    $insertOrderQuery = $conn->query("INSERT INTO `orders`(`name`, `email`, `phone`, `address`, `total`) VALUES ('$name', '$email', '$phone', '$address', $total)");
    if ($insertOrderQuery) {
        $orderId = $conn->insert_id;
        foreach ($_SESSION['cart'] as $id => $productData) {
            $quantity = $productData['quantity'];
            $selectProductQuery = $conn->query("SELECT * FROM `products` WHERE `id` = $id");
            $product = $selectProductQuery->fetch_assoc();
            $price = $product['price'];
            $insertOrderItemQuery = $conn->query("INSERT INTO `order_items`(`order_id`, `product_id`, `quantity`, `price`) VALUES ($orderId, $id, $quantity, $price)");
        }
        unset($_SESSION['cart']);
        echo "<script>
            toastr.success('Order placed successfully');
            setTimeout(function() {
                window.location.href = './';
            }, 2000);
        </script>";
    } else {
        echo "<script>toastr.error('Error: " . mysqli_error($conn) . "')</script>";
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center py-5 display-6">
            Checkout
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-6">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $_SESSION['user']['name'] ?? null ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['user']['email'] ?? null ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <button type="submit" class="btn btn-primary" name="checkoutBtn">Checkout</button>
            </form>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $total = 0;
                        foreach ($_SESSION['cart'] as $id => $productData) {
                            $quantity = $productData['quantity'];
                            $selectProductQuery = $conn->query("SELECT * FROM `products` WHERE `id` = $id");
                            $product = $selectProductQuery->fetch_assoc();
                            $total += $product['price'] * $quantity;
                    ?>
                            <tr>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['price'] ?></td>
                                <td><?= $quantity ?></td>
                                <td><?= $product['price'] * $quantity ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="3">Total</td>
                        <td><?= $total ?? null ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once '../footer.php';
?>