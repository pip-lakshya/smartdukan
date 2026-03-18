<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes manually if not using Composer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $phone= $_POST['phone'];
    $subject = $_POST['subject'];
    

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'bhandarilakshya14@gmail.com'; // Your Gmail
    $mail->Password   = 'ssea qpyy eyat tytx'; // App Password (generated from Google)
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Email setup
    $mail->setFrom('bhandarilakshya14@gmail.com', 'Smart Dukan Contact Form');
    $mail->addAddress('bhandarilakshya14@gmail.com'); // Your email to receive messages
    $mail->isHTML(true);
    $mail->Subject = 'New Customer Contact';
    $mail->Body    = "
        <h2>Customer Details</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong><br>$message</p>
    ";

    $mail->send();
    echo "<script>alert('Message sent successfully!'); window.location.href='contact.php';</script>";
} catch (Exception $e) {
    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); window.location.href='contact.php';</script>";
}
?>
