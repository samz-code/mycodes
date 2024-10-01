<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "emonisamuel54@gmail.com"; // Your email address
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    $host = 'smtp.gmail.com'; // Your SMTP server
    $username = 'emonisamuel54@gmail.com'; // Your Gmail address
    $password = 'uwfa kqza vsxb glev'; // Your Gmail app password
    $port = 587; // Usually 587 for TLS
    
    // Include SwiftMailer autoloader
    require_once 'path/to/vendor/autoload.php';

    // Create a transport
    $transport = (new Swift_SmtpTransport($host, $port, 'tls'))
        ->setUsername($username)
        ->setPassword($password);

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $mailMessage = (new Swift_Message($subject))
        ->setFrom([$username => 'Your Name'])
        ->setTo([$to])
        ->setBody($body);

    // Send the message
    if ($mailer->send($mailMessage)) {
        echo "Message sent successfully!";
    } else {
        echo "Message could not be sent.";
    }
} else {
    echo "Invalid request.";
}
?>
