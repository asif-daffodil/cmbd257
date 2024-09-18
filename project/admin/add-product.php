<?php require_once "./header.php" ?>
<?php require_once './components/navbar.php'; ?>
<?php
if (isset($_POST['addProduct'])) {
    $name = $conn->real_escape_string(secureData($_POST['name']));
    $price = $conn->real_escape_string(secureData($_POST['price']));
    $description = $conn->real_escape_string(secureData($_POST['description']));
    $image = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $image = time() . $image;
    $imagePath = "../assets/images/products/$image";
    move_uploaded_file($imageTmp, $imagePath);
    $addProductQuery = $conn->query("INSERT INTO `products`(`name`, `price`, `description`, `image`) VALUES ('$name', '$price', '$description', '$image')");
    if ($addProductQuery) {
        echo "<script>toastr.success('Product added successfully')</script>";
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
                <div class="col-md-6 border rounded shadow p-4">
                    <h2>Add Product</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "./footer.php" ?>