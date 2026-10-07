<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data safely
    $name = htmlspecialchars(trim($_POST['name']));
    $designation = htmlspecialchars(trim($_POST['designation']));
    $company = htmlspecialchars(trim($_POST['company']));
    $field = htmlspecialchars(trim($_POST['field']));
    $address = htmlspecialchars(trim($_POST['address']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('Please fill in all required fields (Name, Email, and Message).'); window.history.back();</script>";
        exit;
    }

    // Email content
    $to = "aadiekaksha@gmail.com, saadhanaicharitabletrust@gmail.com, info@saadhanaicharitabletrust.org"; // Change to your Gmail address
    $subject = "New Enquiry Form Submission from $name";
    $body = "
    Name: $name\n
    Designation: $designation\n
    Company: $company\n
    Business/Field: $field\n
    Address: $address\n
    Email: $email\n
    Phone: $phone\n
    Mobile: $mobile\n
    Message: \n$message
    ";
    $headers = "From: $email\r\nReply-To: $email";

   // Send Email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you for your enquiry. We will get back to you soon.'); window.location.href='../index.html';</script>";
    } else {
        echo "<script>alert('Sorry, there was an error sending your message. Please try again later.'); window.history.back();</script>";
    }
}
?>
