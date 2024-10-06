<?php require_once "./header.php" ?>
<?php require_once './components/navbar.php'; ?>
<?php
if (isset($_POST['updateStatus'])) {
    $productId = $conn->real_escape_string(secureData($_POST['product_id']));
    $status = $conn->real_escape_string(secureData($_POST['status']));
    $updateStatusQuery = $conn->query("UPDATE `order_items` SET `status` = '$status' WHERE `product_id` = $productId");
    if ($updateStatusQuery) {
        echo "<script>toastr.success('Status updated successfully')</script>";
    } else {
        echo "<script>toastr.error('Error: " . mysqli_error($conn) . "')</script>";
    }
}
?>
<div class="panel">
    <?php require_once "./components/slidebar.php" ?>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center py-5 display-6">
                    Orders
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php if (!isset($_GET['view'])) { ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $selectOrdersQuery = $conn->query("SELECT * FROM `orders`");
                                while ($order = $selectOrdersQuery->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?= $order['id'] ?></td>
                                        <td><?= $order['name'] ?></td>
                                        <td><?= $order['email'] ?></td>
                                        <td><?= $order['phone'] ?></td>
                                        <td><?= $order['address'] ?></td>
                                        <td><?= $order['total'] ?></td>
                                        <td>
                                            <a href="./orders.php?view=<?= $order['id'] ?>" class="btn btn-primary">View</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $orderId = $_GET['view'];
                                $selectOrderQuery = $conn->query("SELECT * FROM `orders` WHERE `id` = $orderId");
                                $order = $selectOrderQuery->fetch_assoc();
                                $selectOrderItemsQuery = $conn->query("SELECT * FROM `order_items` WHERE `order_id` = $orderId");
                                while ($orderItem = $selectOrderItemsQuery->fetch_assoc()) {
                                    $selectProductQuery = $conn->query("SELECT * FROM `products` WHERE `id` = " . $orderItem['product_id']);
                                    $product = $selectProductQuery->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><?= $product['name'] ?></td>
                                        <td><?= $product['price'] ?></td>
                                        <td><?= $orderItem['quantity'] ?></td>
                                        <td><?= $product['price'] * $orderItem['quantity'] ?></td>
                                        <td>
                                            <form action="" method="post" class="d-flex">
                                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                <select name="status" id="status" class="form-select me-2">
                                                    <option value="pending" <?= $orderItem['status'] == 'pending' ? 'selected' : null ?>>Pending</option>
                                                    <option value="shipped" <?= $orderItem['status'] == 'shipped' ? 'selected' : null ?>>Shipped</option>
                                                    <option value="delivered" <?= $orderItem['status'] == 'delivered' ? 'selected' : null ?>>Delivered</option>
                                                </select>
                                                <button class="btn btn-primary btn-sm" name="updateStatus">Update</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "./footer.php" ?>