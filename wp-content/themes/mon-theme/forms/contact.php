<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    // Email recipient
    $to = "your-email@example.com"; // Replace with your email address
    $headers = array(
        'Content-Type' => 'text/html; charset=UTF-8',
        'From' => $email,
        'Reply-To' => $email
    );

    // Email subject and body
    $email_subject = "New Message from $name: $subject";
    $email_body = "<p><strong>Name:</strong> $name</p>";
    $email_body .= "<p><strong>Email:</strong> $email</p>";
    $email_body .= "<p><strong>Message:</strong><br>$message</p>";

    // Send the email
    if (wp_mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "There was an error sending your message.";
    }
} else {
    echo "Invalid request.";
}
?>
