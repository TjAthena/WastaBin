<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define your email here
    $to_email = "your@example.com";

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Compose email content
    $subject = "Quote Request";
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Message: $message\n";

    // Set headers
    $headers = "From: $name <$email>";

    // Send email
    if (mail($to_email, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    // If not a POST request, redirect back to the form
    header("Location: ../index.html");
}
?>
