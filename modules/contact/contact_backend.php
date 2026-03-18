<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $phone   = trim($_POST['phone']);
    // $subject   = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Recipient Email Address
    $to = "bhandarilakshya14@gmail.com"; 

    // Subject
    $subject = "New Contact Form Message from $name";

    // Email Content
    $body = "You have received a new message from your website contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    // $body .= "Subject: $subject\n";
    $body .= "Message:\n$message\n";

    // Headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send Email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href = 'contact.php';</script>";
    } else {
        echo "<script>alert('Failed to send message. Please try again.'); window.location.href = 'contact.php';</script>";
    }
} else {
    echo "Invalid request.";
}
?>
