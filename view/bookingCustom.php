

<div id="main-top-booking">
    <div id="main-top-overlay-booking">
        <div id="bookingCustom">
        <form action="?page=bookingCustomSummary" method="post">
        <h2>Custom Form</h2>
         <div id="bookingCustomcolumn">
                               <label>Gender</label> <br><select name="givenGender" id="gender" size="1" required>
                                                        <option disabled selected> -- select gender -- </option>
                                                        <option value="Male" >Male</option>
                                                        <option value="Female">Female</option>
                                </select> <br>
                                <label>First name</label> <br><input type="text" name="givenFirst_name" placeholder="Enter first name" tabindex="2" required><br>
                                <label>Last name</label> <br><input type="text" name="givenLast_name" placeholder="Enter last name" tabindex="3" required><br>
                                <label>Birth date</label> <br><input type="date" name="givenBirth_date" placeholder="Enter birth date YYYY-MM-DD" max="2000-12-31" min="1899-01-01" tabindex="4" required><br>  
                                <label>Company</label> <br><input type="text" name="givenCompany" placeholder="Enter Company name" tabindex="5" required><br>                   
                                <label>E-mail</label> <br><input type="email" name="givenEmail" placeholder="Enter e-mail address" tabindex="6" required><br>
                                <label>Telephone</label> <br><input type="text" name="givenPhone_number" placeholder="Enter Phonenumber" tabindex="7" required><br>
<!--                            <label>ZIP code</label> <br><input type="number" name="givenZip_code" placeholder="Enter ZIP code" min="0" tabindex="8" required><br>        
                                <label>Country code</label> <br><input type="text" name="givenCountry_code" placeholder="Enter country code" tabindex="10" required><br> -->
                                

                           
                                 

                                 
                                 
                                      
                                 
         </div>
        <button class="btn btn-default" type="submit">Next</button>
        </form>
        </div>       
    </div> 
</div>
 
<div id="main-bottom-booking">
                    <ul>
                        <li id="previous-booking-step">
                            <a href="#">
                                <h3>Previous</h3>
                            </a>
                        </li>
                        <li id="next-booking-step">
                            <!--<div id="preDefTourNext"><a href="javascript:{}" onclick="document.getElementById('bookingTwo').submit();"><h3>Next</h3></a></div> -->
                            <div id="preDefTourNext"><a href="#" onclick="validateFormStepOne()" ><h3>Next</h3></a></div>
                            <div id="customNext"><a href="?page=bookingCustom" onclick="validateForm()"><h3>Next</h3></a></div>
                        </li>
                        
                    </ul>
                </div>

               
                     

    


