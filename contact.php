<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['subject']) &&
    isset($_POST['message'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $em = "Invalid email format";
        header("Location: index.php?error=" . urlencode($em));
        exit;
    }

    if (empty($name) || empty($subject) || empty($message)) {
        $em = "Please fill out all fields";
        header("Location: index.php?error=" . urlencode($em));
        exit;
    }

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                 // Enable SMTP authentication
        $mail->Username   = '';     // SMTP username
        $mail->Password   = '';                  // Use app password, not actual password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable implicit TLS encryption
        $mail->Port       = 465;                                  // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);                            // Set sender
        $mail->addAddress('joe@example.net', 'Joe User');        // Add a recipient
        $mail->addAddress('ellen@example.com');                   // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        // Uncomment these only if needed
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Content
        $mail->isHTML(true);                                      // Set email format to HTML
        $mail->Subject = $subject;                               // Use the subject from the form
        $mail->Body    = '
                          <h3>From: ' . htmlspecialchars($name) . '<br>
                          Email: ' . htmlspecialchars($email) . '<br>
                          Subject: ' . htmlspecialchars($subject) . '<br>
                          Message: ' . nl2br(htmlspecialchars($message)) . '</h3>
                         ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $sm = 'Message has been sent';
        header("Location: index.php?success=" . urlencode($sm));
        exit;
    } catch (Exception $e) {
        $em = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("Location: index.php?error=" . urlencode($em));
        exit;
    }
}