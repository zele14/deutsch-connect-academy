<!-- booking.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sessionType = $_POST['session-type'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    // Email to website owner
    $to = "deutchconnecta@gmail.com";
    $subject = "New Booking Request from $name";
    $body = "Name: $name\nEmail: $email\nSession Type: $sessionType\nPreferred Date: $date\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Booking request sent successfully!";
    } else {
        echo "Failed to send booking request. Please try again.";
    }
}
?>
