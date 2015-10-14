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
                                <label>Gender</label> <input type="text" name="givenGender" placeholder="Mr/Mrs" tabindex="1"><br>
                                <label>First name</label> <input type="text" name="givenFirst_name" placeholder="Enter first name" tabindex="2"><br>                     
                                <label>Address</label> <input type="text" name="givenStreet_address" placeholder="Enter address line" tabindex="4"><br>                           
                                <label>City</label> <input type="text" name="givenCity" placeholder="Enter City" tabindex="6"><br>                               
                                <label>E-mail</label> <input type="text" name="givenEmail" placeholder="Enter e-mail address" tabindex="10"><br> 
                            </div>
                        
                            
                            <div id="form-right-column">
                                 <label>Last name</label> <input type="text" name="givenLast_name" placeholder="Enter last name" tabindex="3"><br>
                                 <label>ZIP code</label> <input type="text" name="givenZip_code" placeholder="Enter ZIP code" tabindex="5"><br>
                                 <label>Country</label> <input type="text" name="givenCountry" placeholder="Enter country" tabindex="7"><br>
                                 <label>Telephone</label> <input type="text" name="givenPhone_number" placeholder="Enter telephone number" tabindex="9"><br>
                                      
                                 
                            </div>
                            <button class="btn btn-default" style="width:100%;background-color: #00ff00;" type="submit">Add</button>
                        </form>
                       
                    </div>
                
                    
                </div>   
               