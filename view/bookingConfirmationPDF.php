<div id="main-top-booking">
    <div id="main-top-overlay-booking">
        <div id="bookingCustom">
            <div id="main-top-overlay-summary">    
        <div id="bookingCustomSummary">
            <h3>Thank You!</h3>   
    <label>Your booking information is sendt to <?php echo "".$_SESSION['givenEmail']?></label>
    <label>Your Customer ID is: <?php echo $_SESSION["CustomerID"] ?></label>
    <label>NB! For your added security our tickets are password protected.</label> 
    <label>Please use your birthdate dd.mm.yyyy as password</label>

</div></div></div></div></div>
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
require_once('vendor/mpdf/mpdf.php');
$mpdf = new mPDF();
$date = date("d-m-Y");
$mpdf->SetProtection(array(), 'UserPassword', $Birth);
$filename="bookings/{$LastName}_{$FirstName}_Booking.pdf";
$mpdf->Image('/style/booking.png',0,0,105,143,'png','',true, false);
// the last "false" allows a full page picture
//$stylesheet = file_get_contents('/style/style.css'); // external css
//$stylesheet = file_get_contents('/style/style.css');
//$mpdf->WriteHTML($stylesheet, 1);

//$html = "<html><<img src='style/booking.png',0,0,210,297,'png' alt=''>";
//$html .= '<table class = "bpmTopnTailC" align="center"><thead>
//	<tr class="headerrow">
//	<th>Electronic Ticket Itinerary and Receipt</th>';
     
     
$html = '<html><body style="background-color:#808080>';
$html.= "<img src='style/booking.png',0,0,210,297,'png' alt=''>";
$html .= '<table class = "bpmTopnTailC" align="center"><thead>
         <tr class="headerrow">
         <th>Electronic Ticket Itinerary and Receipt</th></table>';
$html.=  "<p><b>Date of Issue:</b> {$date}</p>";
$html .= "<p><b>Name:</b> {$FirstName} {$LastName}</p>";
$html .= "<p><b>Tour:</b> {$Dest} <b>Date</b> {$Date} <b>Departure</b> {$Time}</p>";
$html.= "<p><b>Extra Orders:</b> {$Drink}, {$Food}, {$DutyFree}";
$html .= '</body></html>';
$mpdf->WriteHTML($html);    
$mpdf->Output($filename);


//$pdf = new FPDF();
//$date = date("d-m-Y");
//$filename="bookings/{$LastName}_{$FirstName}_Booking.pdf";
//$image = "style/booking.png";
//$pdf->Image($image);
//$pdf->AddPage();
//$pdf->SetFont("Helvetica", "B", 12);
//$pdf->Cell(40, 10, $pdf->Image($image, 90,10,40,20), 30, 20, 'C');
//$pdf->Ln();
//$pdf->Cell(0, 5, "Electronic Ticket Itinerary and Receipt", 0, 0, 'C');
//$pdf->Ln();
//$pdf->Ln();
//$pdf->Cell(0,5, "Name: {$FirstName} {$LastName}", 0, 0, 'L');
//$pdf->Cell(0,5, "Date of Issue: {$date}", 0, 0, 'R');
//$pdf->Ln();
//$pdf->Ln();
//$pdf->Cell(0,5, "Tour: {$Dest}", 0,0, 'L');
//$pdf->Cell(0,5, "Departure: {$Date} {$Time}", 0,0, 'R');
//$pdf->Ln();
//$pdf->Cell(0,5, "Extra Orders:", 0,0, "C");
//$pdf->Ln();
//$pdf->Cell(0,5, "{$Drink}, {$Food}, {$DutyFree}", 0,0,'C');
//$pdf->Output($filename);
  
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
$mail->Subject = 'Electronic Ticket Itinerary and Receipt from TAT ';
$mail->AltBody = 'This is a plain-text message body';
$mail->Body='For your security please use your birth date as password.
    System generated e-mail, please do not respond.
    Attached please find Your Electronic Ticket Itinerary and Receipt.';
$mail->addAttachment($filename) ;

if (!$mail->send()) {
   echo "Mailer Error: " . $mail->ErrorInfo;
} else {
   unlink($filename);
   exit();
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
        








