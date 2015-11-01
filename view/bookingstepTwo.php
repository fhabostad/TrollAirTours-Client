<?php
$takenSeats = $GLOBALS["takenSeats"];

?>
        
<script>
    $(document).ready(function() {
    updateSeats();
    });
   
   
   
   
    function updateSeats()
    {
 
        <?php foreach($takenSeats as $takenSeat): ?>
            for (i=1; i<7 ; i++ ) 
            {
              var x = document.getElementById("A" + i);
              var y = document.getElementById("B" + i);  
              
              
             //window.alert(<?php //echo json_encode($takenSeat["SeatNumber"]) ?> );
       
             
              if(x.value == <?php echo json_encode($takenSeat["SeatNumber"]) ?> )
              {
                  var xLabel = document.getElementById("label" + x.value);
                  xLabel.style.backgroundColor = "red";
                  x.disabled=true;
              }
              
              if(y.value == <?php echo json_encode($takenSeat["SeatNumber"]) ?> )
              {
                  var yLabel = document.getElementById("label" + y.value);
                  yLabel.style.backgroundColor = "red";
                  y.disabled=true;
              }
            }
        <?php endforeach; ?>
        
    }

</script>



<div id="main-top-booking">
    <div id="main-top-overlay-booking">
        <div id="top-text-seatres"> <p> Select seating </p></div>
<div id="planechart"   onload="updateSeats()" >
    <img src="image/planechart.png" />
            <form id="bookingstepTwoForm" action="?page=bookingThree" method="post">
                <ul class="select-seat-row-one" >
                    <li>
                        <input type="radio"  id="A1" value="A1" name="givenSeatNumber"/>
                        <label id="labelA1" for="A1">A1</label>
                    </li>
                    <li>
                        <input type="radio" id="A2" value="A2" name="givenSeatNumber"  />
                        <label id="labelA2" for="A2">A2</label>
                    </li>
                    <li>
                        <input type="radio" id="A3" value="A3" name="givenSeatNumber"  />
                        <label id="labelA3" for="A3">A3</label>
                    </li>
                    <li>
                        <input type="radio" id="A4" value="A4" name="givenSeatNumber"  />
                        <label id="labelA4" for="A4">A4</label>
                    </li>
                    <li>
                        <input type="radio" id="A5" value="A5" name="givenSeatNumber"  />
                        <label id="labelA5" for="A5">A5</label>
                    </li>
                    <li>
                        <input type="radio" id="A6" value="A6" name="givenSeatNumber"/>
                        <label id="labelA6" for="A6">A6</label>
                    </li>
                </ul>
                 <ul class="select-seat-row-two">
                    <li>
                        <input type="radio" id="B1" value="B1" name="givenSeatNumber"/>
                        <label id="labelB1" for="B1">B1</label>
                    </li>
                    <li>
                        <input type="radio" id="B2" value="B2" name="givenSeatNumber"/>
                        <label id="labelB2" for="B2">B2</label>
                    </li>
                    <li>
                        <input type="radio" id="B3" value="B3" name="givenSeatNumber"/>
                        <label id="labelB3" for="B3">B3</label>
                    </li>
                    <li>
                        <input type="radio" id="B4" value="B4" name="givenSeatNumber"/>
                        <label id="labelB4" for="B4">B4</label>
                    </li>
                    <li>
                        <input type="radio" id="B5" value="B5" name="givenSeatNumber"/>
                        <label id="labelB5" for="B5">B5</label>
                    </li>
                    <li>
                        <input type="radio" id="B6" value="B6" name="givenSeatNumber"/>
                        <label id="labelB6" for="B6">B6</label>
                    </li>
                </ul>
            </form>
</div>


   
        
 </div>
    
</div>
    
<div id="main-bottom-booking">
                    <ul>
                        <li id="previous-booking-step">
                            <a href="?page=bookingOne"> <h3>Previous</h3></a>
                        </li>
                        <li id="next-booking-step">
                             <a href="#" onclick="validateSeatReservation()"> <h3>Next</h3></a>
                          <!-- <a href="javascript:{}" onclick="document.getElementById('bookingstepthree').submit();"><h3>Next</h3></a>-->
                        </li>
                        
                    </ul>
                </div>