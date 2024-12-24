<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Honeypot validation: Check if the hidden field is filled
    if (!empty($_POST['website'])) {
        // If the honeypot field is filled, treat as spam and stop processing
        die("Spam detected. Message not sent.");
    }

    // Get form data and sanitize it
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Define email variables
    $to = "manastom670@gmail.com"; // Replace with recipient email
    $email_subject = "New Message from $name - $subject";

    // HTML content for the email
    $email_body = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .email-container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #ffffff;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            }
            .header {
                text-align: center;
                margin-bottom: 20px;
            }
            .header img {
                width: 150px;
                height: auto;
            }
            .content {
                color: #333;
                line-height: 1.6;
            }
            .content h2 {
                color: #449E48;
            }
            .footer {
                text-align: center;
                margin-top: 20px;
                font-size: 12px;
                color: #999;
            }
        </style>
    </head>
    <body>
        <div class='email-container'>
            <div class='header'>
                <img src='https://bestomeorganic.com/img/Bestome_logo.png' alt='Bestome Logo'>
            </div>
            <div class='content'>
                <h2>New Contact Form Submission</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Subject:</strong> $subject</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>
            </div>
            <div class='footer'>
                <p>This email was sent from the contact form on Bestome's website.</p>
            </div>
        </div>
    </body>
    </html>";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        header("Location: thankyou.html");
    } else {
        echo "Failed to send the message. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
