<?php

$Flights = $GLOBALS["flights"];

?>       

<div id="main-top-booking">
                    
<div id="main-top-overlay-booking">
    <form action="?page=bookingThree" method="post">      

             <label for="inputTourType" class="sr-only">Destination</label>
               <select name="givenTourType" class="form-control" id="sel1" required>
                        <option>Select Tour Type</option>
                            <?php foreach($Flights as $Flight): ?> 
                                    <option><?php echo $Flight["TourType"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                      <label for="inputFlightDate" class="sr-only">Date</label>
               <select name="givenFlightDate" class="form-control" id="sel1" required>
                        <option>Select Date</option>
                            <?php foreach($Flights as $Flight): ?> 
                                    <option><?php echo $Flight["FlightDate"]; ?></option>
                            <?php endforeach; ?>
                        
               </select>
                      <label for="inputDeparture" class="sr-only">Departure</label>
               <select name="givenDeparture" class="form-control" id="sel1" required>
                        <option>Select Depature</option>
                            <?php foreach($Flights as $Flight): ?> 
                                    <option><?php echo $Flight["Departure"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                      
                      
                            <button class="btn btn-default" type="submit">Next</button>
      
    </form>
      </div>          