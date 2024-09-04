<?php
require_once '../header.php';
require_once '../components/navbar.php';
?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-4 mx-auto p-4 border rounded shadow">
            <h1 class="text-center">Login</h1>
            <form action="../actions/login.php" method="post">
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