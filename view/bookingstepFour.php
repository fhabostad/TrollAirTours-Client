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
                            <h2>Flight Information</h2>
                            Destination: <?php echo $_SESSION["selectedFlightID"]?><br>
                            Date: <?php echo $_SESSION["givenDate"]?><br>
                            Departure: <?php echo $_SESSION["givenTime"]?><br>
                            
                            
                            <br>                           
                            <h2>Extra Products</h2>
                            Drink :<?php echo "".$_SESSION['givenDrinkName']?><br>
                            Food :<?php echo "".$_SESSION['givenFoodName'];?><br>
                            Dutyfree :<?php echo "".$_SESSION['givenDutyFreeName']?><br>          
                            </div>

 </div>
</div>
       
        
        <div id="main-bottom-booking">
                    <ul>
                        <li id="previous-booking-step">
                            <a href="?page=bookingThree"> <h3>Previous</h3></a>
                        </li>
                        <li id="next-booking-step">
                             <a href="?page=bookingConfirmation"> <h3>Next</h3></a>
                          <!-- <a href="javascript:{}" onclick="document.getElementById('bookingstepthree').submit();"><h3>Next</h3></a>-->
                        </li>
                        
                    </ul>
                </div>