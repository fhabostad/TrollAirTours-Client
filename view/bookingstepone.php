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
                        <form action="?page=addCustomer" method="post">
                            <div id="form-left-column">
                                Gender <input type="text" name="givenGender" placeholder="Mr/Mrs"><br>
                                First name <input type="text" name="givenFirst_name" placeholder="Enter first name"><br>
                                Last name <input type="text" name="givenLast_name" placeholder="Enter last name"><br>
                                Telephone<input type="text" name="givenPhone_number" placeholder="Enter telephone number"><br>
                                
                                
                            </div>
                            
                            <div id="form-right-column">
                                Address line <input type="text" name="givenAddress" placeholder="Enter address line"><br>
                                ZIP code <input type="text" name="givenZip_code" placeholder="Enter ZIP code"><br>
                                E-mail <input type="text" name="givenEmail" placeholder="Enter e-mail address"><br>
                                Country <input type="text" name="givenCountry" placeholder="Enter country"><br>
                                                                                              
                            </div>
                            <button class="btn btn-default" style="width:100%;background-color: #00ff00;" type="submit">Add</button>
                        </form>
                       
                    </div>
                
                    
                </div>   
               