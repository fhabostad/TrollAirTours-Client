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
                    
                    <div id="main-top-booking">
                    
                    <div id="main-top-overlay-booking">
                        <form action="?page=bookingTwo" method="post">
                            <div id="form-left-column">
                                <label>Gender</label> <select name="givenGender" id="gender" size="1" required>
                                                        <option disabled selected> -- select gender -- </option>
                                                        <option value="male" >Male</option>
                                                        <option value="female">Female</option>
                                </select>
                                <label>First name</label> <input type="text" name="givenFirst_name" placeholder="Enter first name" tabindex="2" required><br>
                                <label>Birth date</label> <input type="date" name="givenBirth_date" placeholder="Enter birth date YYYY-MM-DD" max="2000-12-31" min="1899-01-01" tabindex="4" required><br>  
                                <label>City</label> <input type="text" name="givenCity" placeholder="Enter City" tabindex="6" required><br>                   
                                <label>ZIP code</label> <input type="number" name="givenZip_code" placeholder="Enter ZIP code" min="0" tabindex="8" required><br>        
                                <label>Country code</label> <input type="text" name="givenCountry_code" placeholder="Enter country code" tabindex="10" required><br> 
                            </div>

                            <div id="form-right-column">
                                 <label>Last name</label> <input type="text" name="givenLast_name" placeholder="Enter last name" tabindex="3" required><br>
                                 <label>Country</label> <input type="text" name="givenCountry" placeholder="Enter country" tabindex="5" required><br>
                                 <label>Address</label> <input type="text" name="givenStreet_address" placeholder="Enter address line" tabindex="7" required><br>                                                  
                                 <label>E-mail</label> <input type="email" name="givenEmail" placeholder="Enter e-mail address" tabindex="9" required><br> 
                                 <label>Telephone</label> <input type="number" name="givenPhone_number" placeholder="Enter telephone number" min="0" tabindex="11" required><br>
                                      
                                 
                            </div>
                            <button class="btn btn-default" type="submit">Next</button>
                        </form>
                    </div>
                
                    
                </div>   
               