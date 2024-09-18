<?php require_once "./header.php" ?>
<?php require_once './components/navbar.php'; ?>
<div class="panel">
    <?php require_once "./components/slidebar.php" ?>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (!isset($_GET['eid']) && !isset($_GET['did'])) { ?>
                        <h2>All Products</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $products = $conn->query("SELECT * FROM `products`");
                                $sn = 1;
                                while ($product = $products->fetch_assoc()) {
                                ?>
                                    <tr valign="middle">
                                        <td><?= $sn++ ?></td>
                                        <td><?= $product['name'] ?></td>
                                        <td><img src="../assets/images/products/<?= $product['image'] ?>" style="width: 80px; height: 80px; object-fit: cover;"></td>
                                        <td><?= $product['price'] ?></td>
                                        <td>
                                            <a href="all-products.php?eid=<?= $product['id'] ?>" class="btn btn-primary">Edit</a>
                                            <a href="all-products.php?did=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                    <?php
                    if (isset($_POST['editProduct'])) {
                        $eid = $conn->real_escape_string(secureData($_POST['eid']));
                        $name = $conn->real_escape_string(secureData($_POST['name']));
                        $price = $conn->real_escape_string(secureData($_POST['price']));
                        $description = $conn->real_escape_string(secureData($_POST['description']));
                        $image = $_FILES['image']['name'];
                        $imageTmp = $_FILES['image']['tmp_name'];
                        // check if image is emty or not
                        if (!empty($image)) {
                            $image = time() . $image;
                            $imagePath = "../assets/images/products/$image";
                            move_uploaded_file($imageTmp, $imagePath);
                            // unlink previous image
                            $oldImage = $conn->query("SELECT `image` FROM `products` WHERE `id` = $eid")->fetch_assoc()['image'];
                            unlink("../assets/images/products/$oldImage");
                            $updateProductQuery = $conn->query("UPDATE `products` SET `name` = '$name', `price` = '$price', `description` = '$description', `image` = '$image' WHERE `id` = $eid");
                            if ($updateProductQuery) {
                                echo "<script>toastr.success('Product updated successfully')</script>";
                            } else {
                                echo "<script>toastr.error('Error: " . mysqli_error($conn) . "')</script>";
                            }
                        } else {
                            $updateProductQuery = $conn->query("UPDATE `products` SET `name` = '$name', `price` = '$price', `description` = '$description' WHERE `id` = $eid");
                            if ($updateProductQuery) {
                                echo "<script>toastr.success('Product updated successfully')</script>";
                            } else {
                                echo "<script>toastr.error('Error: " . mysqli_error($conn) . "')</script>";
                            }
                        }
                    }

                    if (isset($_GET['eid'])) {
                        $eid = $_GET['eid'];
                        $product = $conn->query("SELECT * FROM `products` WHERE `id` = $eid")->fetch_assoc();
                    ?>
                        <h2>Edit Product</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="border rounded shadow p-3 h-100">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="eid" value="<?= $eid ?? null ?>">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Product Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required value="<?= $product['name'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="number" name="price" id="price" class="form-control" required value="<?= $product['price'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" id="description" class="form-control" required><?= $product['description'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary" name="editProduct">Edit Product</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-5 h-100 d-flex justify-content-center align-items-center">
                                    <img src="../assets/images/products/<?= $product['image'] ?>" style="width: 340px; height: 340px; object-fit: contain;" class="img-thumbnail p-3 rounded border shadow" id="shoeImage">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const image = document.querySelector('#image');
    const shoeImage = document.querySelector('#shoeImage');
    image.addEventListener('change', () => {
        const imageFile = image.files[0];
        const reader = new FileReader();
        reader.onload = () => {
            shoeImage.src = reader.result;
        }
        reader.readAsDataURL(imageFile);
    });
</script>
<?php require_once "./footer.php" ?>