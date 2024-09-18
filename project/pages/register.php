<?php
require_once '../header.php';
require_once '../components/navbar.php';

if (isset($_SESSION['user']) && $_SESSION['token'] == "cmbd257") {
    header('location: ./');
}

if (isset($_POST['register'])) {
    $name =  secureData($_POST['name']);
    $email = secureData($_POST['email']);
    $password = secureData($_POST['password']);

    if (empty($name) || empty($email) || empty($password)) {
        echo "<script>toastr.error('All fields are required')</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>toastr.error('Invalid email address')</script>";
    } else {
        // check email is unique
        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>toastr.error('Email already exists')</script>";
        } else {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>toastr.success('User registered successfully');setTimeout(()=> location.href='./login.php', 2000)</script>";
            } else {
                echo "<script>toastr.error('Error: " . mysqli_error($conn) . "')</script>";
            }
        }
    }
}
?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-4 p-4 mx-auto border rounded shadow">
            <h1 class="text-center">Register</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required value="<?= $name ?? null ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required value="<?= $email ?? null ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="showPassword">
                        <label for="showPassword" class="form-check-label">Show Password</label>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="register">Register</button>
                </div>
            </form>
            <small>Already have account? <a href="./login.php">Login Here</a></small>
        </div>
    </div>
</div>
<script>
    document.querySelector('input[name="showPassword"]').addEventListener('change', () => {
        const password = document.querySelector('input[name="password"]');
        if (event.target.checked) {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
    });
</script>
<?php
require_once '../footer.php';
?>