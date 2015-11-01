

<div id="main-top-booking">
    <div id="main-top-overlay-booking">
        <div id="bookingCustom">
            <div id="main-top-overlay-summary">    
        <div id="bookingCustomSummary">
                                <h2>Summary</h2>
                                <h3>Flight details</h3>
                                <label>Destination: <?php echo $_SESSION["givenCustomDestination"];?></label>  
                                <label>Date: <?php echo $_SESSION["givenPreferredDate"];?> </label>  
                                <label>Time: <?php echo $_SESSION["givenPreferredTime"];?> </label> 
                                <label>Guide: <?php echo $_SESSION["givenGuide"];?> </label>
                                
                               
                                <h3>Peronal details</h3>
                                <label>Company: <?php echo $_SESSION["givenCompany"];?></label>  
                                <label>First name: <?php echo $_SESSION["givenFirst_name"];?> </label>  
                                <label>Last name: <?php echo $_SESSION["givenLast_name"];?> </label> 
                                 
                                <h3>Contact information</h3>
                                <label>E-mail: <?php echo $_SESSION["givenEmail"];?></label>  
                                <label>Telephone: <?php echo $_SESSION["givenPhone_number"];?></label>  
            
                                <p>Please check that all the details are correct.</p>
                                 
                                      
                                 
         </div>
            </div>
        </div>       
    </div> 
</div>
 
<div id="main-bottom-booking">
                    <ul>
                        <li id="previous-booking-step">
                            <a href="?page=home"><h3>Cancel</h3></a>
                            </a>
                        </li>
                        <li id="next-booking-step">
                            <!--<div id="preDefTourNext"><a href="javascript:{}" onclick="document.getElementById('bookingTwo').submit();"><h3>Next</h3></a></div> -->
                            
                            <div id="preDefTourNext"><a href="?page=bookingSuccess" onclick="validateForm()"><h3>Send Request</h3></a></div>
                        </li>
                        
                    </ul>
                </div>

               
                     

    


