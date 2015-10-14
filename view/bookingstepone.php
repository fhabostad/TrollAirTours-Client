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
                        <form action="?page=bookingsteptwo" method="post">
                            <div id="form-left-column">
                                <label>Gender</label> <select name="gender" id="gender" size="1">
                                                     <optgroup label="Select gender:">
                                                        <option value="male" Selected>Male</option>
                                                        <option value="female">Female</option>
                                                     </optgroup>
                                </select>
                                                     
                                <label>First name</label> <input type="text" name="givenFirst_name" placeholder="Enter first name" tabindex="2" required><br>                     
                                <label>Address</label> <input type="text" name="givenStreet_address" placeholder="Enter address line" tabindex="4" required><br>                           
                                <label>City</label> <input type="text" name="givenCity" placeholder="Enter City" tabindex="6" required><br>                               
                                <label>E-mail</label> <input type="text" name="givenEmail" placeholder="Enter e-mail address" tabindex="10" required><br> 
                            </div>
                        
                            
                            <div id="form-right-column">
                                 <label>Last name</label> <input type="text" name="givenLast_name" placeholder="Enter last name" tabindex="3" required><br>
                                 <label>ZIP code</label> <input type="text" name="givenZip_code" placeholder="Enter ZIP code" tabindex="5" required><br>
                                 <label>Country</label> <input type="text" name="givenCountry" placeholder="Enter country" tabindex="7" required><br>
                                 <label>Telephone</label> <input type="text" name="givenPhone_number" placeholder="Enter telephone number" tabindex="9" required><br>
                                      
                                 
                            </div>
                            <button class="btn btn-default" type="submit">Add</button>
                        </form>
                       <!-- <input type="text" name="givenGender" placeholder="Mr/Mrs" tabindex="1" required><br> -->
                    </div>
                
                    
                </div>   
               