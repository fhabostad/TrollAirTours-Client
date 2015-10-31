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
                            <label>Destination: <?php echo $_SESSION["givenDestination"]. " NOK " . $_SESSION['givenPrice']?></label>
                            <label>Date: <?php echo $_SESSION["givenDate"]?></label>
                            <label>Departure: <?php echo $_SESSION["givenTime"]?></label>
                                         
                            <h3>Extra Products</h3>
                            <label>Drink: <?php echo "".$_SESSION['givenDrinkName']. " NOK " . $_SESSION['givenDrinkPrice']?></label>
                            <label>Food: <?php echo "".$_SESSION['givenFoodName']. " NOK " . $_SESSION['givenFoodPrice']?></label>
                            <label>Dutyfree: <?php echo "".$_SESSION['givenDutyFreeName']. " NOK " . $_SESSION['givenDutyFreePrice']?></label>       
   
       </div>
       <?php
                $FlightPrice    = $_SESSION["givenPrice"];
                $FoodPrice      = $_SESSION["givenFoodPrice"];
                $DutyFreePrice  = $_SESSION["givenDutyFreePrice"];
                $DrinkPrice     = $_SESSION["givenDrinkPrice"];
                $TotalPrice     = $FlightPrice + $FoodPrice + $DutyFreePrice + $DrinkPrice;
                $paypal_url     ='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
                $paypal_id      ='trollairtours@gmail.com'; // Business email ID
 
                ?>

                <div class="product">            
                You will be charged: 
                </div>
                <div class="price">
                <?php echo $TotalPrice?>Nok
                </div>
                <div class="btn">
                <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
                <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="item_name" value="Troll Air Tours">
                <input type="hidden" name="item_number" value="1">
                <input type="hidden" name="credits" value="510">
                <input type="hidden" name="userid" value="1">
                <input type="hidden" name="amount" value="<?php echo $TotalPrice?>"/>
                <input type="hidden" name="no_shipping" value="1">
                <input type="hidden" name="currency_code" value="NOK">
                <input type="hidden" name="handling" value="0">
                <input type="hidden" name="cancel_return" value="http://localhost/TrollAirTours-client/?page=bookingOne">
                <input type="hidden" name="return" value="http://localhost/TrollAirTours-client/?page=bookingConfirmation">
                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form> 
    </div>
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