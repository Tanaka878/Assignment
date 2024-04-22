<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $service = $_POST["service"];
    $message = $_POST["message"];

    // You can perform additional validation here

    // Send email notification (example)
    $to = "musungaretanaka@gmail.com"; // Replace with your email address
    $subject = "New Appointment Request";
    $message = "Name: $name\nEmail: $email\nPhone: $phone\nDate: $date\nTime: $time\nService: $service\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your appointment request. We will contact you shortly.";
    } else {
        echo "Failed to send appointment request. Please try again later.";
    }
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: appointment-form.html");
    exit;
}
?>
