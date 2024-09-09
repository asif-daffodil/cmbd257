<?php
require_once '../header.php';
require_once '../components/navbar.php';
if (isset($_POST['changePassword'])) {
    $currentPassword = $conn->real_escape_string(secureData($_POST['currentPassword']));
    $newPassword = $conn->real_escape_string(secureData($_POST['newPassword']));
    $confirmPassword = $conn->real_escape_string(secureData($_POST['confirmPassword']));

    $id = $_SESSION['user']['id'];
    $selectUserQuery = $conn->query("SELECT * FROM `users` WHERE `id` = $id");
    $selectUser = $selectUserQuery->fetch_assoc();
    if (password_verify($currentPassword, $selectUser['password'])) {
        if ($newPassword == $confirmPassword) {
            $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $updatePasswordQuery = $conn->query("UPDATE `users` SET `password` = '$newPassword' WHERE `id` = $id");
            if ($updatePasswordQuery) {
                echo "<script>toastr.success('Password changed successfully')</script>";
            } else {
                echo "<script>toastr.error('Error: " . mysqli_error($conn) . "')</script>";
            }
        } else {
            echo "<script>toastr.error('New password and confirm password does not match')</script>";
        }
    } else {
        echo "<script>toastr.error('Invalid current password')</script>";
    }
}
?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-4 mx-auto p-4 border shadow rounded">
            <h1 class="mb-3">Change Password</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="password" name="currentPassword" class="form-control" placeholder="Current password">
                </div>
                <div class="mb-3">
                    <input type="password" name="newPassword" class="form-control" placeholder="New password">
                </div>
                <div class="mb-3">
                    <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="changePassword">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once '../footer.php';
?>