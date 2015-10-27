<div id="main-top-booking">
    <div id="main-top-overlay-booking">
                        
            
                            <div id="bookingCustom">
                             <h2>Please review your information</h2> 
                             <div id="bookingCustomSummary">
                                 
                            <h3>Personal details:</h3>    
                            Gender : <?php echo "".$_SESSION['givenGender']?> Born: <?php echo "".$_SESSION['givenBirth_date']?><br>
                            Name : <?php echo $_SESSION['givenLast_name'] . ", " . $_SESSION['givenFirst_name']?><br>
                            Address : <?php echo "".$_SESSION['givenStreet_address'] . ", ".$_SESSION['givenZip_code'] . ", " . $_SESSION['givenCity']?><br>    
                            Country : <?php echo "".$_SESSION['givenCountry']?><br>
                            Phone: <?php echo "+".$_SESSION['givenCountry_code']. " ". $_SESSION['givenPhone_number']?><br>
                            Email: <?php echo "".$_SESSION['givenEmail']?><br>
                            
                            <h3>Flight Information</h3>
                            Destination: <?php echo $_SESSION["selectedFlightID"]?><br>
                            Date: <?php echo $_SESSION["givenDate"]?><br>
                            Departure: <?php echo $_SESSION["givenTime"]?><br>
                                         
                            <h3>Extra Products</h3>
                            Drink: <?php echo "".$_SESSION['givenDrinkName']?><br>
                            Food: <?php echo "".$_SESSION['givenFoodName'];?><br>
                            Dutyfree: <?php echo "".$_SESSION['givenDutyFreeName']?><br>          
                            </div>
 </div>
 </div>
</div>
       
        
        <div id="main-bottom-booking">
                    <ul>
                        <li id="previous-booking-step">
                            <a href="?page=bookingThree"> <h3>Previous</h3></a>
                        </li>
                        <li id="next-booking-step">
                             <a href="?page=bookingConfirmation"> <h3>Confirm/Pay</h3></a>
                          <!-- <a href="javascript:{}" onclick="document.getElementById('bookingstepthree').submit();"><h3>Next</h3></a>-->
                        </li>
                        
                    </ul>
                </div>