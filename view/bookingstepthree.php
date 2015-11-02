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
    <div id='CircleLocation'>
    <div class='circleBase'>
        <span> 1 </span> 
            
    </div>
     <div class='circleBase'>
         <span> 2 </span> 
    </div>
     <div class='circleBaseActive'>
         <span> 3 </span> 
    </div>
     <div class='circleBase'>
         <span> 4 </span> 
    </div>
    </div>
                        
                        <form id="bookingstepthreeform" action="?page=bookingFour" method="post">
                            <div id="form-left-column">
                                <label>Gender</label> <select id="Gender" name="givenGender"  size="1" required>
                                                        <option disabled selected> -- select gender -- </option>
                                                        <option value="Male" >Male</option>
                                                        <option value="Female">Female</option>
                                </select>
                                <label>First name</label> <input id="Firstname" type="text" name="givenFirst_name" value="<?php print "".$_SESSION['givenFirst_name']?>" placeholder="Enter first name" tabindex="2" ><br>
                                <label>Birth date</label> <input id="Birthdate" type="date" name="givenBirth_date" value="<?php print "".$_SESSION['givenBirth_date']?>" placeholder="Enter birth date YYYY-MM-DD" max="2000-12-31" min="1899-01-01" tabindex="4" required><br>  
                                <label>City</label> <input id="City" type="text" name="givenCity" value="<?php print "".$_SESSION['givenCity']?>" placeholder="Enter City" tabindex="6" required><br>                   
                                <label>ZIP code</label> <input id="Zipcode" type="number" name="givenZip_code" value="<?php print "".$_SESSION['givenZip_code']?>" placeholder="Enter ZIP code" min="0" tabindex="8" required><br>        
                                <label>Country code</label> <input id="Countrycode" type="text" name="givenCountry_code" value="<?php print "".$_SESSION['givenCountry_code']?>" placeholder="Enter country code" tabindex="10" required><br> 
                            </div>

                            <div id="form-right-column">
                                 <label>Last name</label> <input id="Lastname" type="text" name="givenLast_name" value="<?php print "".$_SESSION['givenLast_name']?>" placeholder="Enter last name" tabindex="3" required><br>
                                 <label>Country</label> <input id="Country" type="text" name="givenCountry" value="<?php print "".$_SESSION['givenCountry']?>" placeholder="Enter country" tabindex="5" required><br>
                                 <label>Address</label> <input id="Streetaddress" type="text" name="givenStreet_address" value="<?php print "".$_SESSION['givenStreet_address']?>" placeholder="Enter address line" tabindex="7" required><br>                                                  
                                 <label>E-mail</label> <input id="Email" type="email" name="givenEmail" value="<?php print "".$_SESSION['givenEmail']?>" placeholder="Enter e-mail address" tabindex="9" required><br> 
                                 <label>Telephone</label> <input id="Phonenumber" type="number" name="givenPhone_number" value="<?php print "".$_SESSION['givenPhone_number']?>" placeholder="Enter telephone number" min="0" tabindex="11" required><br>
                                      
                                 
                            </div>
                            
                        </form>
                    </div>
                
                    
                </div>   

                <div id="main-bottom-booking">
                    <ul>
                        <li id="previous-booking-step">
                            <a href="?page=bookingOne"> <h3>Previous</h3></a>
                        </li>
                        <li id="next-booking-step">
                            
                           <a href="#" onclick="validateFormStepThree();"><h3>Next</h3></a>
                        </li>
                        
                    </ul>
                </div>
               