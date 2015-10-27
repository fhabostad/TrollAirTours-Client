<div id="main-top-booking">
<div id="main-top-overlay-booking">
    Your booking information is sendt to <?php echo "".$_SESSION['givenEmail']?><br>
Your booking ref is: ???

</div>


</div>

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
require 'vendor/phpmailer/phpmailer/PHPMailerautoload.php';
$pdf = new FPDF();
$filename="bookings/{$LastName}_{$FirstName}_Booking.pdf";
$image = "image/logov2.png";
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
$pdf->Output($filename);
  
date_default_timezone_set('Etc/UTC');



//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "trollairtours@gmail.com";
$mail->Password = "Hallo1234";
$mail->setFrom('trollairtours@gmail.com', 'noreply');
$mail->addAddress('trollairtours@gmail.com'/*$Email, $FirstName.$LastName*/);
$mail->Subject = 'Your travel documents';
$mail->AltBody = 'This is a plain-text message body';
$mail->Body='Here is your travel documents';
$mail->addAttachment($filename) ;

if (!$mail->send()) {
   echo "Mailer Error: " . $mail->ErrorInfo;
} else {
   unlink($filename);
   //echo "Message sent!";
}
?>
<div id="main-bottom-booking">
                    <ul>
                        <li id="previous-booking-step">
                            <a href="?page=bookingOne"> <h3>Previous</h3></a>
                        </li>
                        <li id="next-booking-step">
                             <a href="?page=bookingThree"> <h3>Next</h3></a>
                          <!-- <a href="javascript:{}" onclick="document.getElementById('bookingstepthree').submit();"><h3>Next</h3></a>-->
                        </li>
                        
                    </ul>
                </div>
        








