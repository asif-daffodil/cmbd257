<?php
require_once '../header.php';
require_once '../components/navbar.php';

if (isset($_SESSION['user']) && $_SESSION['token'] == "cmbd257") {
    header('location: ./');
}

if (isset($_POST['login'])) {
    $email = $conn->real_escape_string(secureData($_POST['email']));
    $password = $conn->real_escape_string(secureData($_POST['password']));
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            $_SESSION['token'] = "cmbd257";
            echo "<script>toastr.success('Login successful');setTimeout(()=> location.href='./', 2000)</script>";
        } else {
            echo "<script>toastr.error('Invalid password')</script>";
        }
    }
}
?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-4 mx-auto p-4 border rounded shadow">
            <h1 class="text-center">Login</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>
            </form>
            <small>Don't have account? <a href="./register.php">Register Here</a></small>
        </div>
    </div>
</div>
<?php
require_once '../footer.php';
?>