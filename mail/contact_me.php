<?php
// Check for empty fields
if(empty($_POST['fname'])      ||
   empty($_POST['lname'])
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

$fname = strip_tags(htmlspecialchars($_POST['fname']));
$lname = strip_tags(htmlspecialchars($_POST['lname']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'mail@kevmosse.com';
$email_subject = "Website Contact Form:  $fname $lname";
$email_body = "New message from website contact form.\n\n"."Here are the details:\n\nName: $fname $lname\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@kevmosse.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
