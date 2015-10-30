<div id="main-top-booking">
    <div id="main-top-overlay-booking">
        <div id="bookingCustom">
            <div id="main-top-overlay-summary">    
        <div id="bookingCustomSummary">
            <h3>Thank You!</h3>   
    <label>Your booking information is sendt to <?php echo "".$_SESSION['givenEmail']?></label>
    <label>Your BookingID ID is: TAT<?php echo $_SESSION['BookingID'] ?> </label>
    <label>Your Customer  ID is: <?php echo $_SESSION['CustomerID'] ?> </label>
    <label>NB! For your added security our tickets are password protected.</label> 
    <label>Please use your birthdate dd.mm.yyyy as password</label>

</div></div></div></div></div>
<div id="main-bottom-booking">
                    <ul style="width:100%;">
                        
                        <li style="width:99%; text-align: center;">
                            <!--<div id="preDefTourNext"><a href="javascript:{}" onclick="document.getElementById('bookingTwo').submit();"><h3>Next</h3></a></div> -->
                            <div id="preDefTourNext"><a href="?page=home" onclick="validateForm()"><h3 text-align="center">Home</h3></a></div>
                        </li>
                        
                    </ul>
                </div>

<?php 
$Ref            = $_SESSION['BookingID'];
$RefCust        = $_SESSION['CustomerID'];
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
$Dest           = $_SESSION['givenDestination'];
$Fligthnr       = $_SESSION["selectedFlightID"];
$Date           = $_SESSION['givenDate'];
$Time           = $_SESSION['givenTime'];
$Drink          = $_SESSION['givenDrinkName'];
$Food           = $_SESSION['givenFoodName'];
$DutyFree       = $_SESSION['givenDutyFreeName'];      
$Seat           = $_SESSION["givenSeatNumber"];

ob_start();
require 'controller/Fpdf.php';
require 'vendor/phpmailer/phpmailer/PHPMailerautoload.php';
require_once('vendor/mpdf/mpdf.php');
require_once ('vendor/phpqrcode/qrlib.php');

// This makes the QR code
$tempDir = 'bookings/';
$codeContents = "{$Ref} -- {$RefCust} - {$Gender} - {$Birth} - {$FirstName} - {$LastName} - {$Adress} - {$ZipCode} - {$City} - {$Country} - {$CountryCode} - {$Phone} - {$Email} - {$Dest} - {$Date} - {$Time} - $Seat - {$Drink} - {$Food} - {$DutyFree}";
$qfileName = '005_file_'.md5($codeContents).'.png';
$pngAbsoluteFilePath = $tempDir.$qfileName;
$urlRelativeFilePath = "bookings/$qfileName";
    
    // generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath);
           
    } else {
    
    }
$mpdf = new mPDF();
$date = date("d-m-Y");
//$mpdf->SetProtection(array(), 'UserPassword', $Birth);
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
     
     
$html   = '<html><body>';
//$html.= "<img src='style/booking.png',0,0,210,297,'png' alt=''>";
$html   .= '<div style="text-align:center;"><img src="image/test.png"/></div>'; // Troll Logo
$html   .= '<table class = "bpmTopnTailC" align="center"><thead>
            <tr class="headerrow">
            <th>Electronic Ticket Itinerary and Receipt</th></table>';
$html   .=  "<p><b>Booking Reference:</b> TAT{$Ref}</p>";
$html   .=  "<p><b>Date of Issue:</b> {$date}</p>";
$html   .= "<p><b>Name:</b> {$FirstName} {$LastName}</p>";
$html   .= "<p><b>Tour:</b> {$Fligthnr } {$Dest} </P>"; 
$html   .= "<p><b>Date</b> {$Date} <b>Departure</b> {$Time}</p>";
$html   .= "<P><b>Seat</b> {$Seat}</p>";  
$html   .= "<p><b>Extra Orders:</b> {$Drink}, {$Food}, {$DutyFree}";
$html   .= "<p><img src='$urlRelativeFilePath'></p>";
$html   .= '</body></html>';
$mpdf->WriteHTML($html);    
$mpdf->Output($filename);


date_default_timezone_set('Etc/UTC');



//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();
//$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "trollairtours@gmail.com";
$mail->Password = "Hallo1234";
$mail->setFrom('trollairtours@gmail.com', 'noreply');
$mail->addAddress('trollairtours@gmail.com'/*$Email, $FirstName.$LastName*/);
$mail->Subject = 'Electronic Ticket Itinerary and Receipt from TAT ';
$mail->AltBody = 'This is a plain-text message body';
$mail->Body='For your security, added birth date is your password for the pdf.
    System generated e-mail, please do not respond.
    Attached please find Your Electronic Ticket Itinerary and Receipt.';
$mail->addAttachment($filename) ;

if (!$mail->send()) {
   echo "Mailer Error: " . $mail->ErrorInfo;
   // Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
   
} else {
   unlink($filename);
   unlink($urlRelativeFilePath);
   // Unset all of the session variables.
    $_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
    session_destroy();

   exit();
   //echo "Message sent!";
}
?>









