<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Set the recipient email address
  $recipient = "waleedbarry7@gmail.com.com";

  // Set the email subject
  $subject = "Form Submission from " . $name;

  // Construct the email body
  $body = "Name: " . $name . "\n";
  $body .= "Email: " . $email . "\n";
  $body .= "Message: " . $message;

  // Use mail() function to send the email
  mail($recipient, $subject, $body);
}
?>
