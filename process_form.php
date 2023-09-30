<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set the recipient email address
    $to = "psuthar318@gmail.com"; // Change this to the desired email address

    // Create email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Mobile Number: $mobile\n";
    $email_message .= "Subject: $subject\n";
    $email_message .= "Message:\n$message";

    // Send the email
    mail($to, "Contact Form Submission", $email_message, $headers);

    // Redirect to a thank you page or display a thank you message
    header("Location: index.html"); // Change the URL as needed
    // exit();
}
?>
 