<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);

    // Validate form data (you can add more validation as needed)
    $errors = [];
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    if (empty($phone)) {
        $errors[] = "Phone number is required";
    }
    if (empty($message)) {
        $errors[] = "Message is required";
    }

    // If there are no errors, send email
    if (empty($errors)) {
        $to = "tjpradeep2000@gmail.com"; // Change this to your email address
        $subject = "New Quote Request";
        $body = "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Phone Number: $phone\n";
        $body .= "Message:\n$message";

        // Send email
        $headers = "From: $email\r\n";
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for your inquiry. We will get back to you shortly.";
        } else {
            echo "Failed to send email. Please try again later.";
        }
    } else {
        // If there are errors, display them
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
