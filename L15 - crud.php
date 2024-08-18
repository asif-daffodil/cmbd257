<?php

try {
    $conn = mysqli_connect("localhost", "root", "",  "cmbd257");
} catch (mysqli_sql_exception $e) {
    die("Coonection Failed : " . $e->getMessage());
}

if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $createQuery = "INSERT INTO `users`(`name`, `email`) VALUES ('$name', '$email')";
    $create = mysqli_query($conn, $createQuery);
    if (!$create) {
        echo "<script>alert('Something went wrong')</script>";
    } else {
        echo "<script>alert('Student added successfully')</script>";
    }
}

$readQuery = "SELECT * FROM `users`";
$read = mysqli_query($conn, $readQuery);
$users = mysqli_fetch_all($read, MYSQLI_ASSOC);



?>

<?php if (!isset($_GET['uid']) && !isset($_GET['did'])) { ?>
    <h2>All users</h2>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>S.N.</td>
            <td>Name</td>
            <td>Email</td>
            <td>Registration Date</td>
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
                <td>
                    <?= date("F/d/Y h:i:s - A", strtotime($user['created_at'])) ?>
                </td>
                <td>
                    <a href="L15 - crud.php?uid=<?= $user['id'] ?>"><button>Update</button></a>
                    <a href="L15 - crud.php?did=<?= $user['id'] ?>"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br><br>
    <h2>Add Student</h2>
    <form action="" method="post">
        <input type="text" placeholder="User Name" name="name" required>
        <br><br>
        <input type="email" placeholder="User Email" name="email" required>
        <br><br>
        <input type="submit" value="Add Student" name="create">
    </form>
<?php } ?>

<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];

    if (empty($name)) {
        $errName = "<span style='color: red'>Name is required</span>";
    } else {
        $crrName = $name;
    }

    if (empty($email)) {
        $errEmail = "<span style='color: red'>Email is required</span>";
    } else {
        $crrEmail = $email;
    }

    if (!empty($crrName) && !empty($crrEmail)) {
        $updateQuery = "UPDATE `users` SET `name` = '$name', `email` = '$email' WHERE `id` = $uid";
        $update = mysqli_query($conn, $updateQuery);
        if (!$update) {
            echo "<script >alert('Something went wrong')</script>";
        } else {
            echo "<script>alert('Student updated successfully');location.href='./" . basename($_SERVER['PHP_SELF']) . "'</script>";
        }
    }
}

if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $userQuery = "SELECT * FROM `users` WHERE `id` = $uid";
    $runUserQuery = mysqli_query($conn, $userQuery);
    $user = mysqli_fetch_assoc($runUserQuery);
?>
    <h2>Update user</h2>
    <form action="" method="post">
        <input type="hidden" name="uid" value="<?= $user['id'] ?>">
        <input type="text" placeholder="User Name" name="name" value="<?= $user['name'] ?>">
        <?= $errName ?? null ?>
        <br><br>
        <input type="email" placeholder="User Email" name="email" value="<?= $user['email'] ?>">
        <?= $errEmail ?? null ?>
        <br><br>
        <input type="submit" value="Update Student" name="update">
        <a href="<?= basename($_SERVER['PHP_SELF']) ?>">
            <button type="button">Cancel</button>
        </a>
    </form>
<?php } ?>

<?php
if (isset($_POST['delete'])) {
    $did = $_POST['did'];
    $deleteQuery = "DELETE FROM `users` WHERE `id` = $did";
    $delete = mysqli_query($conn, $deleteQuery);
    if (!$delete) {
        echo "<script>alert('Something went wrong')</script>";
    } else {
        echo "<script>alert('Student deleted successfully');location.href='./" . basename($_SERVER['PHP_SELF']) . "'</script>";
    }
}

if (isset($_GET['did'])) {
    $did = $_GET['did'];
?>
    <h2>Do you realy want to delete the user?</h2>
    <form action="" method="post">
        <input type="hidden" name="did" value="<?= $did ?>">
        <input type="submit" value="Yes" name="delete">
        <a href="<?= basename($_SERVER['PHP_SELF']) ?>">
            <button type="button">No</button>
        </a>
    </form>
<?php } ?>