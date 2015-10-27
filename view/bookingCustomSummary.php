

<div id="main-top-booking">
    <div id="main-top-overlay-booking">
        <div id="bookingCustom">
        <form action="?page=bookingSuccess" method="post">
        <h2>Summary</h2>
         <div id="bookingCustomSummary">
                                <h3>Peronal details</h3>
                                <label>Company: </label> <?php echo $_SESSION["givenCompany"];?><br> 
                                <label>First name: </label> <?php echo $_SESSION["givenFirst_name"];?><br> 
                                <label>Last name: </label> <?php echo $_SESSION["givenLast_name"];?><br> 
                                 
                                <h3>Contact information</h3>
                                <label>E-mail: </label> <?php echo $_SESSION["givenEmail"];?><br> 
                                <label>Telephone: </label> <?php echo $_SESSION["givenPhone_number"];?><br> 
                                                                          
                                 
                                 
                                      
                                 
         </div>
        <button class="btn btn-default" type="submit">Send request</button>
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

               
                     

    


