<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = 'jameswebsolutions.org@gmail.com'; // Add your organization's email here
    $subject = 'New Contact Form Submission';
    $headers = "From: " . $email . "\r\n" .
        "Reply-To: " . $email . "\r\n" .
        "X-Mailer: PHP/" . phpversion();
    $email_body = "You have received a new message from " . $name . " (" . $email . "):\n\n" . $message;
    mail($to, $subject, $email_body, $headers);
    header("Location: thankyou.html"); // Redirect to a thank you page
}
?>
