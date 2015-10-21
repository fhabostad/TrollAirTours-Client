<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="main-top-booking">
    <div id="main-top-overlay-booking">
                        
        
                            <div id="form-left-column">
                            Please review your booking information<br>
                            Gender :<?php echo "".$_SESSION['givenGender']?><br>
                            Birth date :<?php echo "".$_SESSION['givenBirth_date']?><br>
                            First Name :<?php echo "".$_SESSION['givenFirst_name']?><br>
                            Last Name :<?php echo "".$_SESSION['givenLast_name']?><br>
                            Address :<?php echo "".$_SESSION['givenStreet_address']?><br>    
                            Zip Code :<?php echo "".$_SESSION['givenZip_code']?><br>
                            City :<?php echo "".$_SESSION['givenCity']?><br>
                            Country :<?php echo "".$_SESSION['givenCountry']?><br>
                            <br>
                            Country Code: <?php echo "".$_SESSION['givenCountry_code']?><br>
                            Phone: <?php echo "".$_SESSION['givenPhone_number']?><br>
                            Email: <?php echo "".$_SESSION['givenEmail']?> 
                            </div>

                                      