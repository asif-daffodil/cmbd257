<?php

if (isset($_POST['sendMail'])) {
    $to = "asifmdabir@gmail.com";
    $subject = $_POST['ysubject'];
    $message = $_POST['ymsg'];
    $headers = "From: " . $_POST['ymail'];

    if (!filter_var($_POST['ymail'], FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
    } else {
        if (mail($to, $subject, $message, $headers)) {
            echo "Mail sent successfully";
        } else {
            echo "Mail sending failed";
        }
    }
}
?>

<form action="" method="post">
    <input type="text" placeholder="Your Email" name="ymail" required>
    <br><br>
    <input type="text" placeholder="Subject" name="ysubject" required>
    <br><br>
    <textarea name="ymsg" placeholder="Your Message" required></textarea>
    <br><br>
    <input type="submit" name="sendMail">
</form>