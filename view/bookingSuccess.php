

<div id="main-top-booking">
    <div id="main-top-overlay-booking">
        <div id='CircleLocation'>
            <div class='circleBase'>
                <span> 1 </span>             
            </div>
            <div class='circleBase'>
                <span> 2 </span> 
            </div>
            <div class='circleBase'>
                <span> 3 </span> 
            </div>
            <div class='circleBaseActive'>
                <span> 4 </span> 
            </div>
        </div>
        <div id="bookingCustom">
            <div id="bookingSuccess">
                <div id="main-top-overlay-summary">
                    <h2>Success</h2>
                    <h3><p>Your Ref.nr: <?php echo $_SESSION['BookingID'] ?></p></h3>
                    <label><h3>You have now Sent a request for your customized tour!</label>
                    <label><p>We will send an answer to you email address <h4><?php echo "".$_SESSION['givenEmail']?></h4></label>
                    <label>within a few working days.</p></label>                                          
                </div>                        
            </div>  
        </div>       
    </div> 
</div>
 
<div id="main-bottom-booking">
    <ul style="width:100%;">                       
        <li style="width:99%; text-align: center;">
            <!--<div id="preDefTourNext"><a href="javascript:{}" onclick="document.getElementById('bookingTwo').submit();"><h3>Next</h3></a></div> -->
            <div id="preDefTourNext"><a href="?page=home" onclick="validateForm()"><h3 text-align="center">Home</h3></a></div>
        </li>                        
    </ul>
</div>

               
                     

    


