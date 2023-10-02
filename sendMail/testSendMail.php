<?php
use sendMail\vendor\phpmailer\phpmailer\src\PHPMailer.php;
use sendMail\vendor\phpmailer\phpmailer\src\SMTP.php;
use sendMail\vendor\phpmailer\phpmailer\src\Exception.php;

require 'sendMail\vendor\autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Your email configuration settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'psuthar318@gmail.com'; // Your Gmail email address
        $mail->Password = 'Pardip@143kk'; // Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender and recipient email addresses
        $mail->setFrom('your@gmail.com', 'Your Name');
        $mail->addAddress('psuthar318@gmail.com', 'Pradeep Suthar');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Email from ' . $_POST['full_name'];
        $bodyContent = "<h1>Hello!</h1>";
        $bodyContent .= '<p>' . $_POST['full_name'] . ' is trying to connect with you for ' . $_POST['subject'] . ' inquiry</p>';
        $bodyContent .= '<p>Name: ' . $_POST['full_name'] . '</p>';
        $bodyContent .= '<p>Email: ' . $_POST['email'] . '</p>';
        $bodyContent .= '<p>Contact Number: ' . $_POST['phone'] . '</p>';
        $bodyContent .= '<p>Message: ' . $_POST['message'] . '</p>';
        $bodyContent .= '<p>Address: ' . $_POST['subject'] . '</p>';

        $mail->Body = $bodyContent;

        // Send the email
        $mail->send();
        echo 'Message has been sent.';
    } catch (Exception $e) {
        echo 'Message was not sent. Mailer error: ' . $mail->ErrorInfo;
    }
}
?>
