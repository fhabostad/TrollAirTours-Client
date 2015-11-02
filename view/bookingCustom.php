

<div id="main-top-booking">
    <div id="main-top-overlay-booking">
        <div id="bookingCustom">
        <h2>Custom Form</h2>
        <div id="infobox">
            <p>
                Please fill out the required personal details about yourself.
                The company input field is not required if you're not booking
                for a whole company.
                
            </p>
        </div>
         <div id="bookingCustomcolumn">
                                <form action="?page=bookingCustomSummary" id="bookingSummary" method="post">
                                <h3>Personal details</h3>
                                <label>Company</label> <br><input id="Company" type="text" name="givenCompany" placeholder="Enter Company name" tabindex="1" required><br>                   
                                <label>First name</label> <br><input id="Firstname" type="text" name="givenFirst_name" placeholder="Enter first name" tabindex="2" required><br>
                                <label>Last name</label> <br><input id="Lastname" type="text" name="givenLast_name" placeholder="Enter last name" tabindex="3" required><br>
                                
                                <h3>Contact information</h3>
                                <label>E-mail</label> <br><input id="Email" type="email" name="givenEmail" placeholder="Enter e-mail address" tabindex="4" required><br>
                                <label>Telephone</label> <br><input id="Phonenumber" type="text" name="givenPhone_number" placeholder="Enter Phonenumber" tabindex="5" required><br>
<!--                            <label>ZIP code</label> <br><input type="number" name="givenZip_code" placeholder="Enter ZIP code" min="0" tabindex="8" required><br>        
                                <label>Country code</label> <br><input type="text" name="givenCountry_code" placeholder="Enter country code" tabindex="10" required><br> -->
                                

                           
                                 

                                 
                                 
                                      
                                 
         </div>
        </form>
        </div>       
    </div> 
</div>
 
<div id="main-bottom-booking">
                    <ul>
                        <li id="previous-booking-step">
                            <a href="?page=bookingOne">
                                <h3>Previous</h3>
                            </a>
                        </li>
                        <li id="next-booking-step">
                            <!--<div id="preDefTourNext"><a href="javascript:{}" onclick="document.getElementById('bookingTwo').submit();"><h3>Next</h3></a></div> -->
                            <div id="preDefTourNext"><a href="#" onclick="validateBookingCustom()"><h3>Next</h3></a>
                            </div>
                          
                        </li>
                        
                    </ul>
                </div>

               
                     

    


