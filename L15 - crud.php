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