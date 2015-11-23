<?php
	header('Content-type: application/json');
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;
# Instantiate the client.
$mgClient = new Mailgun('key-1e4bfe88704d486073f4077593bb4794');
$domain = "mg.buildfromzero.com";

	$status = array(
		'type'=>'success',
		'message'=>'Thank you for contact us. As early as possible  we will contact you '
	);

    $name = stripslashes($_POST['name']); 
    $email = stripslashes($_POST['email']); 
    $subject = stripslashes($_POST['subject']); 
    $message = stripslashes($_POST['message']); 

    $email_from = $email;
    $email_to = 'email@email.com';//replace with your email

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

$result = $mgClient->sendMessage($domain, array(
    'from'    => 'Virgin Mariya <mailgun@mg.buildfromzero.com>',
    'to'      => 'tommy <tom@buildfromzero.com>',
    'subject' => 'Hello',
    'text'    => $body
));



  //  $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die;