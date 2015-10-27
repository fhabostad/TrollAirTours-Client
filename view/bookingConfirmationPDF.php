




<?php //


/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'vendor/phpmailer/phpmailer/PHPMailerautoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "trollairtours@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "Hallo1234";

//Set who the message is to be sent from
$mail->setFrom('trollairtours@gmail.com', 'First Last');

//Set an alternative reply-to address
$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('ebnesjen@gmail', 'John Doe');

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
$mail->Body='email with proper report automatically mailed by php script.';
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}





//
//
// require 'vendor/phpmailer/phpmailer/class.phpmailer.php';
//require 'vendor/phpmailer/phpmailer/PHPMailerautoload.php';
//$m = new PHPMailer;
//
//$m->isSMTP();
//$m->SMTPAuth = true;
//$m->SMTPDebug = 4;
//
//$m->HOST = 'smtp.gmail.com';
//$m->Username = 'trollairtours@gmail.com';
//$m->Password = 'Hallo1234';
//$m->SMTPSecure = 'ssl';
//$m->Port = 587;
//
//$m->From = 'trollairtours@gmail.com';
//$m->FromName = 'Booking';
//$m->Password = 'Hallo1234';
//$m->addReplyTo('no_reply@trollairtours.no', 'No reply');
//$m->addAddress('fhabostad@gmail.com', 'Fredrik');
//
//$m->Subject = 'Confirmation';
//$m->Body = 'This is body';
//$m->AltBody = 'Alt body';
//var_dump($m->send());











//$Gender         = $_SESSION['givenGender'];
//$Birth          = $_SESSION['givenBirth_date'];
//$FirstName      = $_SESSION['givenFirst_name'];
//$LastName       = $_SESSION['givenLast_name'];
//$Adress         = $_SESSION['givenStreet_address'];
//$ZipCode        = $_SESSION['givenZip_code'];
//$City           = $_SESSION['givenCity'];
//$Country        = $_SESSION['givenCountry'];
//$CountryCode    = $_SESSION['givenCountry_code'].
//$Phone          = $_SESSION['givenPhone_number'];
//$Email          = $_SESSION['givenEmail'];
//$Dest           = $_SESSION["selectedFlightID"];
//$Date           = $_SESSION['givenDate'];
//$Time           = $_SESSION['givenTime'];
//$Drink          = $_SESSION['givenDrinkName'];
//$Food           = $_SESSION['givenFoodName'];
//$DutyFree       = $_SESSION['givenDutyFreeName'];      
//ob_start();
//require 'controller/Fpdf.php';
//require_once 'vendor/phpmailer/phpmailer/PHPMailerautoload.php';
//require 'vendor/swiftmailer/swiftmailer/lib/swift_required.php';
//$pdf = new FPDF();
//$mail = new PHPmailer(); 
//$filename="{$LastName}booking.pdf";
//$image = "image/logo.png";
//$pdf->Image($image);
//$pdf->AddPage(); 
//$pdf->SetFont("Helvetica", "B", 14);
//$pdf->Cell(0, 10, $pdf->Image($image, 10,10,20,10), 20, 20, 'C', false,'');
//$pdf->Cell(0,10, "Gender: {$Gender}");
//$pdf->Ln();
//$pdf->Cell(0,10, "Birth Date: {$Birth}");
//$pdf->Ln();
//$pdf->Cell(0,10, "Name: {$FirstName} {$LastName}");
//$pdf->Ln();
//$pdf->Cell(0,10, "Address: {$Adress} , {$ZipCode} , {$City}");
//$pdf->Ln();
//$pdf->Cell(0,10, "Country: {$Country}");
//$pdf->Ln();
//$pdf->Cell(0,10, "Phone: +{$CountryCode}");
//$pdf->Ln();
//$pdf->Cell(0,10, "Email: {$Email}");
//$pdf->Ln();
//$pdf->Cell(0,10, "Tour: {$Dest}");
//$pdf->Ln();
//$pdf->Cell(0,10, "Departure: {$Date} {$Time}");
//$pdf->Ln();
//$pdf->Cell(0,10, "Drink: {$Drink}");
//$pdf->Ln();
//$pdf->Cell(0,10, "Food: {$Food}");
//$pdf->Ln();
//$pdf->Cell(0,10, "Dutyfree: {$DutyFree}");
////$doc = $pdf->Output('booking.pdf', "S");
//// email stuff (change data below)
//$mail->IsSMTP();
//$mail->From='fhabostad@gmail.com';
//$mail->FromName = '*********';
//$mail->AddAddress('fhabostad@gmail.com');
//
//$mail->Subject='Sample reports';
//$mail->Body='email with proper report automatically mailed by php script.';
//
//if(!$mail->Send()) {
//echo 'Message could not be sent.';
//echo 'Mailer Error: ' . $mail->ErrorInfo;
//exit;
//}
//
//echo 'Message has been sent'; 