<?php
require_once '../header.php';
require_once '../components/navbar.php';

if (!isset($_SESSION['user']) || $_SESSION['token'] != "cmbd257") {
    header('location: ./login.php');
}

$email = $_SESSION['user']['email'];
$orders = $conn->query("SELECT * FROM `orders` WHERE `email` = '$email'");
$orderItems = [];
while ($order = $orders->fetch_assoc()) {
    $orderId = $order['id'];
    $orderItems[$orderId] = [];
    $orderItemsQuery = $conn->query("SELECT * FROM `order_items` WHERE `order_id` = $orderId");
    while ($orderItem = $orderItemsQuery->fetch_assoc()) {
        $productId = $orderItem['product_id'];
        $product = $conn->query("SELECT * FROM `products` WHERE `id` = $productId")->fetch_assoc();
        $orderItems[$orderId][] = [
            'product' => $product,
            'quantity' => $orderItem['quantity'],
            'status' => $orderItem['status'],
            'total' => $order['total']
        ];
    }
}


?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-12 mx-auto">
            <h1 class="text-center">My Orders</h1>
        </div>
        <div class="row">
            <?php
            foreach ($orderItems as $orderId => $items) {
            ?>
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Order ID: <?= $orderId ?>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sn = 1;
                                    $total = 0;
                                    foreach ($items as $item) {
                                        $product = $item['product'];
                                        $quantity = $item['quantity'];
                                        $total += $item['total'];
                                        $status = $item['status'];
                                    ?>
                                        <tr>
                                            <td><?= $sn++ ?></td>
                                            <td><?= $product['name'] ?></td>
                                            <td><?= $quantity ?></td>
                                            <td><?= $total ?></td>
                                            <td><?= $status ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
require_once '../footer.php';
?>