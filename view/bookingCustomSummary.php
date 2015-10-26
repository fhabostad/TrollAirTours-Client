

<div id="main-top-booking">
    <div id="main-top-overlay-booking">
        <div id="bookingCustom">
        <form action="?page=bookingSuccess" method="post">
        <h2>Summary</h2>
         <div id="bookingCustomcolumn">
                                <label>Gender: </label><br> 
                                <label>First name: </label><br> 
                                <label>Last name: </label><br> 
                                <label>Birth date: </label><br> 
                                <label>Company: </label><br> 
                                <label>E-mail: </label><br> 
                                <label>Telephone: </label><br> 
                                                                          
                                 
                                 
                                      
                                 
         </div>
        <button class="btn btn-default" type="submit">Send</button>
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

               
                     

    


