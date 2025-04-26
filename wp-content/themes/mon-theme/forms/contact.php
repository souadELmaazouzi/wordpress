<?php
// Load WordPress core
require_once($_SERVER['DOCUMENT_ROOT'] . '/wordpress/wp-load.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Clean form data
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    // Get receiver email from Customizer
    $to = get_theme_mod('contact_email', 'info@example.com'); // fallback if empty

    // Setup email headers
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <no-reply@' . $_SERVER['SERVER_NAME'] . '>', 
        'Reply-To: ' . $email
    );

    // Prepare subject and body
    $email_subject = "New Message from $name: $subject";
    $email_body = "<p><strong>Name:</strong> {$name}</p>";
    $email_body .= "<p><strong>Email:</strong> {$email}</p>";
    $email_body .= "<p><strong>Message:</strong><br>{$message}</p>";

    // Send email
    if (wp_mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "There was an error sending your message.";
    }
    
} else {
    echo "Invalid request.";
}
?>
