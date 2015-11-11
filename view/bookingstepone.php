<?php
$calenderDatesGeiranger = $GLOBALS["CalenderDatesGeiranger"];
$calenderDatesAakneset = $GLOBALS["CalenderDatesAakneset"];
$calenderDatesBriksdalen = $GLOBALS["CalenderDatesBriksdalen"];

$flightTimesAndDates = $GLOBALS["flightDateAndTimes"];
$foods = $GLOBALS["foods"];
$drinks = $GLOBALS["drinks"];
$dutyfrees = $GLOBALS["dutyfrees"];


?>




<script>


$(function() {
 $( "#datepicker" ).datepicker({
 beforeShowDay: EnableSpecificDates,
 dateFormat: "yy-mm-dd"

 
 });
 });



function pad(d) {
    return (d < 10) ? '0' + d.toString() : d.toString();
}
 
   
function EnableSpecificDates(date) {


if(document.getElementById('Geiranger').checked) {
  var disableddates = [<?php foreach($calenderDatesGeiranger as $calenderDateGeiranger){ echo  "\"$calenderDateGeiranger\"" . ",";} ?>];
}else if(document.getElementById('Briksdalen').checked) {
  var disableddates = [<?php foreach($calenderDatesBriksdalen as $calenderDateBriksdalen){ echo  "\"$calenderDateBriksdalen\"" . ",";} ?>];
  
}else if(document.getElementById('Aakneset').checked) {
  var disableddates = [<?php foreach($calenderDatesAakneset as $calenderDateAakneset){ echo  "\"$calenderDateAakneset\"" . ",";} ?>];
}     
      
disableddates.push("9999-12-12"); //Adds a date to prevent calender crash.


 var m = date.getMonth();
 var d = pad(date.getDate());
 var y = date.getFullYear();
 
  
 var currentdate = y + "-" + (m+1) + "-" + d;
 //window.alert(currentdate);
 for (var i = 0; i < disableddates.length; i++) {
 if ($.inArray(currentdate, disableddates) !== -1) {
     //window.alert(currentdate);
 return [true];
 }else
 {
     return [false];
 }
 }

}



 
 
 function clearTimeDrop()
 {
     var x = document.getElementById("TimeList");
    var i;
    for(i=x.options.length-1;i>=0;i--)
    {
        x.remove(i);
    } 
 }

 function timedrop()
 {
    clearTimeDrop();
    
    var selectedTourType = "";
    if(document.getElementById('Geiranger').checked) {
        selectedTourType = "Geiranger";
    }else if(document.getElementById('Briksdalen').checked) {
        selectedTourType = "Briksdalen";
    }else if(document.getElementById('Aakneset').checked) {
        selectedTourType = "Aakneset";
    }   
    
    
    
    
    var x = document.getElementById("TimeList");
    var  selectedDate = document.getElementById('datepicker').value;
    
    <?php foreach($flightTimesAndDates as $flightTimeAndDate)
    {?>
        if( ( "<?php echo $flightTimeAndDate["FlightDate"] ?>" ==  selectedDate ) && ( "<?php echo $flightTimeAndDate["TourType"] ?>" ==  selectedTourType ))
        {
            var option = document.createElement("option");
            option.value = "<?php echo $flightTimeAndDate["FlightID"] ?>";
            option.text = "<?php echo $flightTimeAndDate["Departure"] ?>";
            x.add(option);
        }
        
    <?php } ?>
    
     getPrice();
 }


function switchForm()
{
    document.getElementById('datepicker').value = "";
    document.getElementById('datepicker').value = "";
    clearTimeDrop();
    var e = document.getElementById('preDefTour');
    var f = document.getElementById('Custom-form-stepone');
    var g = document.getElementById('preDefTourNext');
    var h = document.getElementById('customNext');
    
    if(document.getElementById('Geiranger').checked) {
            e.style.display = 'block';
            f.style.display = 'none';
            g.style.display = 'block';
            h.style.display = 'none';           
    }else if(document.getElementById('Briksdalen').checked) {
            e.style.display = 'block';
            f.style.display = 'none';
            g.style.display = 'block';
            h.style.display = 'none';
    }else if(document.getElementById('Aakneset').checked) {
            e.style.display = 'block';
            f.style.display = 'none';
            g.style.display = 'block';
            h.style.display = 'none';
    }else if(document.getElementById('Custom').checked) {
            e.style.display = 'none';
            f.style.display = 'block';
            g.style.display = 'none';
            h.style.display = 'block';
    } 
}

function getPrice()
{
    var selectedFlight = document.getElementById('TimeList').value;
    
    <?php foreach($flightTimesAndDates as $flightTimeAndDate)
    {?>
        if ( "<?php echo $flightTimeAndDate["FlightID"] ?>" ==  selectedFlight)
        {
            var flightPrice = "<?php echo $flightTimeAndDate["FlightPrice"] ?>";
            var p =document.getElementById('Price'); 
            p.value = flightPrice;
           
           
        }
        
    <?php } ?>
    getTotalPrice();
    }    
    
    
function getTotalPrice()
 {
     var selectFood = document.getElementById('Food'); 
     var selectedFoodID = selectFood.value;
     var selectDrink = document.getElementById('Drink'); 
     var selectedDrinkID = selectDrink.value;
     var selectDutyFree = document.getElementById('Dutyfree'); 
     var selectedDutyFreeID = selectDutyFree.value;

     
     <?php foreach($foods as $food){?>
         
         if(selectedFoodID == <?php echo $food["ProductID"]?>)
         {
             var selectedFoodPrice =  <?php echo $food["ProductPrice"] ?>;
         }
       <?php } ?>
       
      <?php foreach($drinks as $drink){?>
         
         if(selectedDrinkID == <?php echo $drink["ProductID"]?>)
         {
             var selectedDrinkPrice =  <?php echo $drink["ProductPrice"] ?>;
         }   
                
     <?php } ?>
     
     <?php foreach($dutyfrees as $dutyfree){?>
         
         if(selectedDutyFreeID == <?php echo $dutyfree["ProductID"]?>)
         {
             var selectedDutyFree =  <?php echo $dutyfree["ProductPrice"] ?>;
         }   
                
     <?php } ?>
     
     var p =document.getElementById('Price'); 
     var flightPrice = p.value;

        var totalPrice = 0;
   
   
     
     if(typeof flightPrice != 'undefined')
     {
         totalPrice += +flightPrice;
     }
     
     if(typeof selectedDrinkPrice != 'undefined')
     {
         totalPrice += +selectedDrinkPrice;
     }
     
  
     if(typeof selectedFoodPrice != 'undefined')
     {
         totalPrice += +selectedFoodPrice;
     }
     
     if(typeof selectedDutyFree != 'undefined')
     {
         totalPrice += +selectedDutyFree;
     }

     var y =document.getElementById('TotalPrice'); 
            
     y.value = totalPrice;
        
    
 }



</script>

<div id="main-top-booking">
<div id="main-top-overlay-booking">


    
<div id='CircleLocation'>
    <div class='circleBaseActive'>
        <span> 1 </span> 
            
    </div>
     <div class='circleBase'>
         <span> 2 </span> 
    </div>
     <div class='circleBase'>
         <span> 3 </span> 
    </div>
     <div class='circleBase'>
         <span> 4 </span> 
    </div>
</div>
<form action="?page=bookingTwo" id="bookingTwo" method="post">

    
    <div id="destination-buttons"> 
        <input type="radio" name="givenDestination" id="Geiranger" value="Geiranger" checked="checked" onclick="switchForm()" > Geiranger </input>
        <input type="radio" name="givenDestination" id="Briksdalen" value="Briksdalen" onclick="switchForm()"> Briksdalen </input>
        <input type="radio" name="givenDestination" id="Aakneset" value="Aakneset" onclick="switchForm()"> Aakneset </input>
        <input type="radio" name="givenDestination" id="Custom" value="Custom" onclick="switchForm()"> Custom </input>
    </div>
    
    <div id ="preDefTour">

    <div id="date-and-time">
        
        <label for="inputDate" >Select date</label>
        <input readonly  type="text" id="datepicker" name="givenDate" placeholder="Select Date" onchange="timedrop()">
        
        <label for="inputTime" >Select time</label>
        <select id="TimeList" name="selectedFlightID" onchange="getPrice()" >
            <option disabled selected>- Select time -</option>
        </select>
       
        <label for="inputPrice"></label>
       <input type="hidden" readonly  type="text" id="Price" name="givenPrice" value="0" ></input>
    </div>
       
            


                        <div id="product-form">

                            <label for="inputProductID" >Select your desired products</label>
                         
                            <select id="Food" name="givenFoodID" onchange="getTotalPrice()">
                               <option value="None" selected>- no food selected -</option>
                                <?php foreach($foods as $food): ?> 
                                         <option value="<?php echo $food["ProductID"];?>"><?php echo $food["ProductName"];?>  <?php echo " NOK " . $food["ProductPrice"].",-" ;  ?></option>
                                <?php endforeach; ?>
                            </select>

                            <select id="Drink" name="givenDrinkID" onchange="getTotalPrice()">
                              <option value="None" selected>- no drink selected -</option>
                                <?php foreach($drinks as $drink): ?> 
                               <option value="<?php echo $drink["ProductID"]; ?>"><?php echo $drink["ProductName"];?>  <?php echo " NOK " . $drink["ProductPrice"].",-" ; ?></option>
                                <?php endforeach; ?>
                            </select>

                            <select id="Dutyfree" name="givenDutyFreeID" onchange="getTotalPrice()">
                              <option value="None" selected>- no duty free selected -</option>
                                <?php foreach($dutyfrees as $dutyfree): ?> 
                                         <option value="<?php echo $dutyfree["ProductID"]; ?>"><?php echo $dutyfree["ProductName"];?>  <?php echo " NOK " . $dutyfree["ProductPrice"].",-" ; ?></option>
                                <?php endforeach; ?>
                            </select>
                        <label for="inputTotalPrice">Price NOK:</label>
                        <input readonly  type="text" id="TotalPrice" name="givenTotalPrice" value="0" ></input>
                            </div>
        
                        
    </div>
            
        
        
        
    </form>




    
    
  

<div id="Custom-form-stepone">
    <div id="infobox">
            <p>
                In this custom tour section, you will have to book the whole aircraft
                for a self defined tourtype. <br>
                If you're unsure about which destinations and dates that can be chosen, 
                please use the links for more information. <br>
                <a href='http://localhost/TrollAirTours-Client/?page=about' target='blank'> More Information </a>
                
            </p>
        </div>
    <form action="?page=bookingCustom" id="bookingStepOneCustom" method="post">
    <div id="Custom-form-left">
        
        <label>Destination</label> <br> <input id="input-grow" type="text" name="givenCustomDestination" placeholder="Enter preferred destinations" tabindex="1" required draggable="true"> <a href="#" onclick='toggle_visiblity_infobox()'>(Help)</a><br>
        <label>Date</label> <br> <input id="date" type="text" name="givenPreferredDate" placeholder="Enter pref. (YYYY-MM-DD)" max="2030-31-12" min="2015-12-10" tabindex="2" required><br>
        <label>Time</label> <br> <input id="time" type="text" name="givenPreferredTime" placeholder="Enter preferred (hh:mm)" max="23:59" min="00:00" tabindex="3" required><br>                                                  
    <label>Guide</label> <br> <select id="DropdownGuide" type="text" name="givenGuide" placeholder="Select language" tabindex="4" required>
     <option id="0" index="0" value="select" > -- Select language -- </option>
            <option id="1" index="1" value="No guide" >No guide</option>
            <option id="2" index="2" value="English" >English</option>
            <option id="3" index="3" value="Norwegian">Norwegian</option>
            <option id="4" index="4" value="Chinese">Chinese</option>
            <option id="5" index="5" value="Spanish">Spanish</option>
            <option id="6" index="6" value="French">French</option>
    </select>
    </div>
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
                            <div id="preDefTourNext"><a href="#" onclick="validateFormStepOne()"><h3>Next</h3></a></div>
                            <div id="preDefTourNext"><a href="#" onclick="validateStepOneCustom()"><h3>Next</h3></a></div>
                        </li>
                        
                    </ul>
                </div>
                     

    


