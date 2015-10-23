<?php
//////////////////////////////////////////
// Template for customer listing page
//////////////////////////////////////////

// TODO - initialize necessary variables here (remember to pass them in the controller's render() function)
// Expected variables:
// $customers - list of all customers
// $customerName - last value used in "Add customer" form
//$Customers = $GLOBALS["customers"];
//$CustomerName = $GLOBALS["customerName"];
?>
            
                    <div id="main-top-booking">
                    
                    <div id="main-top-overlay-booking">
                        <form action="?page=bookingFour" method="post">
                            <div id="form-left-column">
                                <label>Gender</label> <select name="givenGender" id="gender" size="1" >
                                                        <option disabled selected> -- select gender -- </option>
                                                        <option value="Male" >Male</option>
                                                        <option value="Female">Female</option>
                                </select>
                                <label>First name</label> <input type="text" name="givenFirst_name" placeholder="<?php print "".$_SESSION['givenFirst_name']?>" tabindex="2" ><br>
                                <label>Birth date</label> <input type="date" name="givenBirth_date" placeholder="<?php echo "".$_SESSION['givenBirth_date']?>" max="2000-12-31" min="1899-01-01" tabindex="4" required><br>  
                                <label>City</label> <input type="text" name="givenCity" placeholder="<?php echo "".$_SESSION['givenCity']?>" tabindex="6" ><br>                   
                                <label>ZIP code</label> <input type="number" name="givenZip_code" placeholder="<?php echo "".$_SESSION['givenZip_code']?>" min="0" tabindex="8" ><br>        
                                <label>Country code</label> <input type="text" name="givenCountry_code" placeholder="<?php echo "".$_SESSION['givenCountry_code']?>" tabindex="10" ><br> 
                            </div>

                            <div id="form-right-column">
                                 <label>Last name</label> <input type="text" name="givenLast_name" placeholder="<?php echo "".$_SESSION['givenLast_name']?>" tabindex="3" ><br>
                                 <label>Country</label> <input type="text" name="givenCountry" placeholder="<?php echo "".$_SESSION['givenCountry']?>" tabindex="5" ><br>
                                 <label>Address</label> <input type="text" name="givenStreet_address" placeholder="<?php echo "".$_SESSION['givenStreet_name']?>" tabindex="7" ><br>                                                  
                                 <label>E-mail</label> <input type="email" name="givenEmail" placeholder="<?php echo "".$_SESSION['givenEmail']?>" tabindex="9" ><br> 
                                 <label>Telephone</label> <input type="number" name="givenPhone_number" placeholder="<?php echo "".$_SESSION['givenPhone_number']?>" min="0" tabindex="11" ><br>
                                      
                                 
                            </div>
                            <button class="btn btn-default" type="submit">Next</button>
                        </form>
                    </div>
                
                    
                </div>   
               