<div id="main-top-booking">
    <div id="main-top-overlay-booking">
        <div id="bookingCustom">
            <div id="main-top-overlay-summary">    
        <div id="bookingCustomSummary">
                            <h2>Please review your information</h2>      
                            <h3>Personal details:</h3>    
                            <label>Gender : <?php echo "".$_SESSION['givenGender']?> Born: <?php echo "".$_SESSION['givenBirth_date']?></label>
                            <label>Name : <?php echo $_SESSION['givenLast_name'] . ", " . $_SESSION['givenFirst_name']?></label>
                            <label>Address : <?php echo "".$_SESSION['givenStreet_address'] . ", ".$_SESSION['givenZip_code'] . ", " . $_SESSION['givenCity']?></label>    
                            <label>Country : <?php echo "".$_SESSION['givenCountry']?></label>
                            <label>Phone: <?php echo "+".$_SESSION['givenCountry_code']. " ". $_SESSION['givenPhone_number']?></label>
                            <label>Email: <?php echo "".$_SESSION['givenEmail']?></label>
                            
                            <h3>Flight Information</h3>
                            <label>Destination: <?php echo $_SESSION["selectedFlightID"]?></label>
                            <label>Date: <?php echo $_SESSION["givenDate"]?></label>
                            <label>Departure: <?php echo $_SESSION["givenTime"]?></label>
                                         
                            <h3>Extra Products</h3>
                            <label>Drink: <?php echo "".$_SESSION['givenDrinkName']?></label>
                            <label>Food: <?php echo "".$_SESSION['givenFoodName'];?></label>
                            <label>Dutyfree: <?php echo "".$_SESSION['givenDutyFreeName']?></label>       
                            </div>
                           
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