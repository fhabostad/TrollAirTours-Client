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
                                <h1>Please review your booking information</h1><br>
                            
                                <h2>Personal details:</h2>    
                            Gender : <?php echo "".$_SESSION['givenGender']?> Born: <?php echo "".$_SESSION['givenBirth_date']?><br>
                            Name : <?php echo $_SESSION['givenLast_name'] . ", " . $_SESSION['givenFirst_name']?><br>
                            Address : <?php echo "".$_SESSION['givenStreet_address'] . ", ".$_SESSION['givenZip_code'] . ", " . $_SESSION['givenCity']?><br>    
                            Country : <?php echo "".$_SESSION['givenCountry']?><br>
                            <br>
                            Phone: <?php echo "+".$_SESSION['givenCountry_code']. " ". $_SESSION['givenPhone_number']?><br>
                            Email: <?php echo "".$_SESSION['givenEmail']?> 
                            <br>                           
                            <h2>Extra Products</h2>
                            Drinks :<?php echo "".$_SESSION['ProductName']?><br>
                            Food :<?php echo "".$_SESSION['givenFoodName'];?><br>
                            Dutyfree :<?php echo "".$_SESSION['ProductName']?><br>          
                            </div>
 <?php

 ?>