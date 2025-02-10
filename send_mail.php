<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer/PHPMailer.php';
require 'includes/PHPMailer/Exception.php';
require 'includes/PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $option = $_POST['option'];
    $terms = isset($_POST['terms']) ? 'Agreed' : 'Not Agreed';
    $contact_pref = $_POST['contact_pref'];
    
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'contact-mail-form.netlify.app/';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // Your Gmail address
        $mail->Password = 'your-app-password'; // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('recipient-email@gmail.com'); // Change to your recipient email

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "<h4>Name: $name</h4>
                         <p>Email: $email</p>
                         <p>Phone: $number</p>
                         <p>Subject: $subject</p>
                         <p>Message: $message</p>
                         <p>Option: $option</p>
                         <p>Terms: $terms</p>
                         <p>Contact Preference: $contact_pref</p>";
        
        $mail->send();
        echo "<script>alert('Message has been sent successfully!'); window.location.href='index.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Error: {$mail->ErrorInfo}'); window.location.href='index.html';</script>";
    }
}
?>
