<?php
$Gender         = $_SESSION['givenGender'];
$Birth          = $_SESSION['givenBirth_date'];
$FirstName      = $_SESSION['givenFirst_name'];
$LastName       = $_SESSION['givenLast_name'];
$Adress         = $_SESSION['givenStreet_address'];
$ZipCode        = $_SESSION['givenZip_code'];
$City           = $_SESSION['givenCity'];
$Country        = $_SESSION['givenCountry'];
$CountryCode    = $_SESSION['givenCountry_code'].
$Phone          = $_SESSION['givenPhone_number'];
$Email          = $_SESSION['givenEmail'];
$Dest           = $_SESSION["selectedFlightID"];
$Date           = $_SESSION['givenDate'];
$Time           = $_SESSION['givenTime'];
$Drink          = $_SESSION['givenDrinkName'];
$Food           = $_SESSION['givenFoodName'];
$DutyFree       = $_SESSION['givenDutyFreeName'];      
ob_start();
require 'controller/Fpdf.php';
require_once 'vendor/phpmailer/phpmailer/PHPMailerautoload.php';
require 'vendor/swiftmailer/swiftmailer/lib/swift_required.php';
$pdf = new FPDF();
$mail = new PHPmailer(); 
$filename="{$LastName}booking.pdf";
$image = "image/logo.png";
$pdf->Image($image);
$pdf->AddPage(); 
$pdf->SetFont("Helvetica", "B", 14);
$pdf->Cell(0, 10, $pdf->Image($image, 10,10,20,10), 20, 20, 'C', false,'');
$pdf->Cell(0,10, "Gender: {$Gender}");
$pdf->Ln();
$pdf->Cell(0,10, "Birth Date: {$Birth}");
$pdf->Ln();
$pdf->Cell(0,10, "Name: {$FirstName} {$LastName}");
$pdf->Ln();
$pdf->Cell(0,10, "Address: {$Adress} , {$ZipCode} , {$City}");
$pdf->Ln();
$pdf->Cell(0,10, "Country: {$Country}");
$pdf->Ln();
$pdf->Cell(0,10, "Phone: +{$CountryCode}");
$pdf->Ln();
$pdf->Cell(0,10, "Email: {$Email}");
$pdf->Ln();
$pdf->Cell(0,10, "Tour: {$Dest}");
$pdf->Ln();
$pdf->Cell(0,10, "Departure: {$Date} {$Time}");
$pdf->Ln();
$pdf->Cell(0,10, "Drink: {$Drink}");
$pdf->Ln();
$pdf->Cell(0,10, "Food: {$Food}");
$pdf->Ln();
$pdf->Cell(0,10, "Dutyfree: {$DutyFree}");
//$doc = $pdf->Output('booking.pdf', "S");
// email stuff (change data below)
$mail->IsSMTP();
$mail->From='fhabostad@gmail.com';
$mail->FromName = '*********';
$mail->AddAddress('fhabostad@gmail.com');

$mail->Subject='Sample reports';
$mail->Body='email with proper report automatically mailed by php script.';

if(!$mail->Send()) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
exit;
}

echo 'Message has been sent'; 