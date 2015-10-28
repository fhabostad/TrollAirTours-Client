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
                            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <table>
                            <tr><td><input type="hidden" name="on0" value="Extras">Extras</td></tr><tr><td><select name="os0">
                            <option value="Tour"><?php echo $_SESSION["selectedFlightID"];?>NOK</option>
                            <option value="Drinks"><?php echo "".$_SESSION['givenFoodName'];?></option>
                            <option value="Food">Food 120,00 NOK</option>
                            <option value="Dutyfree">Dutyfree 800,00 NOK</option>
                            </select> </td></tr>
                            </table>
                            <input type="hidden" name="currency_code" value="NOK">
                            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
                            ">
                            <input type="image" src="https://www.paypalobjects.com/no_NO/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal – den trygge og enkle metoden for å betale på nettet.">
                            <img alt="" border="0" src="https://www.paypalobjects.com/no_NO/i/scr/pixel.gif" width="1" height="1">
                            </form>

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