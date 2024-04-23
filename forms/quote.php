<?php
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'tjpradeep2000@gmail.com';

  // Validate form fields
  if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['message'])) {
    die('Please fill in all required fields.');
  }

  // Validate email address
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die('Invalid email address.');
  }
/* */
  // Build email message
  $message = "Name: {$_POST['name']}\n";
  $message .= "Email: {$_POST['email']}\n";
  $message .= "Phone: {$_POST['phone']}\n";
  $message .= "Message:\n{$_POST['message']}\n";

  // Send email
  $headers = 'From: ' . $_POST['name'] . ' <' . $_POST['email'] . '>' . "\r\n" .
    'Reply-To: ' . $_POST['email'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  if (mail($receiving_email_address, 'Request for a quote', $message, $headers)) {
    echo 'Email sent successfully.';
  } else {
    die('Error sending email.');
  }
?>