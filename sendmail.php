<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form inputs
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));
    $phone   = htmlspecialchars(trim($_POST['phone']));

    // Your email address where you want to receive the form submissions
    $to = "signaturevillas@arhomes.in"; 

    // Subject
    $subject = "New Contact Form Submission from " . $name;

    // Message body
    $body  = "You have received a new message from your website contact form.\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Phone: $phone\n\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers  = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message delivery failed.";
    }
} else {
    // If someone directly opens sendmail.php in browser
    http_response_code(403);
    echo "Forbidden";
}
?>
