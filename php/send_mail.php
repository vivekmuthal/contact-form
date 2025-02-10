<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $options = $_POST['options'];
    $subscribe = isset($_POST['subscribe']) ? 'Yes' : 'No';
    $contact_method = $_POST['contact_method'];

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '=vivekmuthal07@gmail.com';
        $mail->Password = '123456';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('vivekmuthal07@gmail.com');
        $mail->Subject = $subject;
        $mail->Body = "Name: $name\nEmail: $email\nNumber: $number\nMessage: $message\nOption: $options\nSubscribe: $subscribe\nPreferred Contact Method: $contact_method";

        $mail->send();
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
