<?php
try {
    $conn = mysqli_connect("localhost", "root", "", "cmbd257");
} catch (mysqli_sql_exception $e) {
    die("Connection Fail:" . $e->getMessage());
}
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $createQuery = "INSERT INTO `users`(`name`,`email`) VALUES ('$name','$email')";
    $create = mysqli_query($conn, $createQuery);
}
$readQuery = "SELECT * FROM `users`";
$read = mysqli_query($conn, $readQuery);
$users = mysqli_fetch_all($read, MYSQLI_ASSOC);

?>
<?php if (!isset($_GET['uid']) && !isset($_GET['did'])) { ?>
    <table border="1" cellspacing='0' cellpadding='5' class="mainTable">
        <tr>
            <td>S.N</td>
            <td>Name</td>
            <td>Email</td>
            <td>Reg Date</td>
            <td>Action</td>
        </tr>
        <?php
        $sn = 1;
        foreach ($users as $user) {
        ?>
            <tr>
                <td><?= $sn++ ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= date("F/d/Y h:i:s - A", strtotime($user['created_at'])) ?></td>

                <td>
                    <a href="crud.php?uid=<?= $user['id'] ?>"><button>Update</button></a>
                    <a href="crud.php?did= <?= $user['id'] ?>"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br><br>
    <!-- ------------All users ---------------->
    <div class="container">
        <h2>All User</h2>
        <form action="" method="post">
            <input type="text" placeholder="User Name" name="name">
            <br><br>
            <input type="email" placeholder="User Email" name="email" required>
            <br><br>
            <input type="submit" class='btn' value="Add Student" name="create">

        </form>
    </div>
    <!-- ----------Update User ----------------->
<?php } ?>
<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];

    if (empty($name)) {
        $errName = "<span style = 'color:red; font-size: 12px;'>Name is requerd!</span>";
    } else {
        $crrName = $name;
    }
    if (empty($email)) {
        $errEmail = "<span style = 'color:red; font-size: 12px;'>Email is requerd!</span>";
    } else {
        $crrEmail = $email;
    }
    if (isset($crrName) && isset($crrEmail)) {
        $updateQuery = "UPDATE `users` SET `name` = '$name', `email`= '$email' WHERE `id`= $uid";
        $update = mysqli_query($conn, $updateQuery);

        if (!$update) {
            echo "<script> alert ('Something went wrong')</script>";
        } else {
            echo "<script> alert ('Update is successful');location.href='./" . basename($_SERVER['PHP_SELF']) . "'</script>";
        }
    }
}

if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $userQuery = "SELECT * FROM `users`WHERE `id` = $uid";
    $runuser = mysqli_query($conn, $userQuery);
    $user = mysqli_fetch_assoc($runuser);

?>
    <div class="container">
        <h2>Update User</h2>
        <form action="" method="post">
            <input type="hidden" name="uid" value="<?= $user['id'] ?>">
            <input type="text" placeholder="User Name" name="name" value='<?= $user['name'] ?>'>
            <?= $errName ?? null ?>
            <br><br>
            <input type="email" placeholder="User Email" name="email" value='<?= $user['email'] ?>'>
            <?= $errEmail ?? null ?>
            <br><br>
            <input type="submit" class='btn' value="Update Student" name="update">
            <a href="<?= $_SERVER['PHP_SELF'] ?>">
                <button type="button" class="btn2">Cancel</button>
            </a>
        </form>
    </div>
<?php } ?>
<!-- ----------Delete User ----------------->
<?php
if (isset($_POST['delete'])) {
    $did = $_POST['did'];
    $deleteQuery = "DELETE FROM `users` WHERE `id` = $did";
    $delete = mysqli_query($conn, $deleteQuery);

    if (!$delete) {
        echo "<script> alert ('Something went wrong')</script>";
    } else {
        echo "<script> alert ('Student delete successfully');location.href='./" . basename($_SERVER['PHP_SELF']) . "' </script>";
    }
}
if (isset($_GET['did'])) {
    $did = $_GET['did'];
?>

    <div class="form-popup">
        <h3>Do you want to delete user!</h3>

        <div>
            <form action="" method="post">
                <input type="hidden" name="did" value="<?= $did ?>">
                <div class="form-box">
                    <input type="submit" name="delete" value="Yes" class="btn3">
                    <a href="<?= $_SERVER['PHP_SELF'] ?>">
                        <button type="button" class="btn4">No</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
<?php } ?>

<!------------ style.css link -------------->
<style>
    <?php include 'style.css'; ?>
</style>