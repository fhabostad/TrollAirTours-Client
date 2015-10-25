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



function test()
{
    window.alert("yo");
}
   
   
function EnableSpecificDates(date) {


if(document.getElementById('Geiranger').checked) {
  var disableddates = [<?php foreach($calenderDatesGeiranger as $calenderDateGeiranger){ echo  "\"$calenderDateGeiranger\"" . ",";} ?>];
}else if(document.getElementById('Briksdalen').checked) {
  var disableddates = [<?php foreach($calenderDatesBriksdalen as $calenderDateBriksdalen){ echo  "\"$calenderDateBriksdalen\"" . ",";} ?>];
  
}else if(document.getElementById('Aakneset').checked) {
  var disableddates = [<?php foreach($calenderDatesAakneset as $calenderDateAakneset){ echo  "\"$calenderDateAakneset\"" . ",";} ?>];
}     
      
disableddates.push("10.10.9999");
        
 var m = date.getMonth();
 var d = date.getDate();
 var y = date.getFullYear();
 
 var currentdate = d + "." + (m + 1) + "." + y; 
 for (var i = 0; i < disableddates.length; i++) {
 if ($.inArray(currentdate, disableddates) !== -1) {
 return [true];
 }else
 {
     return [false];
 }
 }

 
 
}

$(function() {
 $( "#datepicker" ).datepicker({
dateFormat: "dd.mm.yy",
 beforeShowDay: EnableSpecificDates
 
 });
timedrop();

 });
 
 
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
     var x = document.getElementById("TimeList");
    var  selectedDate = document.getElementById('datepicker').value;
    
    <?php foreach($flightTimesAndDates as $flightTimeAndDate)
    {?>
        if( "<?php echo $flightTimeAndDate["FlightDate"] ?>" ==  selectedDate)
        {
            var option = document.createElement("option");
            option.text = "<?php echo $flightTimeAndDate["Departure"] ?>";
            x.add(option);
        }
        
    <?php } ?>
    
     
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


</script>

<div id="main-top-booking">
<div id="main-top-overlay-booking">


<form action="?page=bookingTwo" id="bookingTwo" method="post">

    <div id="destination-buttons"> 
        <input type="radio" name="gender" id="Geiranger" value="Geiranger" checked="checked" onclick="switchForm()" > Geiranger </input>
        <input type="radio" name="gender" id="Briksdalen" value="Briksdalen" onclick="switchForm()"> Briksdalen </input>
        <input type="radio" name="gender" id="Aakneset" value="Aakneset" onclick="switchForm()"> Aakneset </input>
        <input type="radio" name="gender" id="Custom" value="Custom" onclick="switchForm()"> Custom </input>
    </div>
    
    <div id ="preDefTour">

    <div id="date-and-time">
        Date: <input type="text" id="datepicker">
        <select id="TimeList" onclick="timedrop()"></select>
    </div>



                        <div id="product-form">

                            <label for="inputProductID" >Select your desired products</label>
                         
                            <select name="givenFoodID" required>
                               <option value="None" selected>- no food selected -</option>
                                <?php foreach($foods as $food): ?> 
                                         <option value="<?php echo $food["ProductID"]; ?>"><?php echo $food["ProductName"];  ?></option>
                                <?php endforeach; ?>
                            </select>

                            <select name="givenDrinkID" required>
                              <option value="None" selected>- no drink selected -</option>
                                <?php foreach($drinks as $drink): ?> 
                               <option value="<?php echo $drink["ProductID"]; ?>"><?php echo $drink["ProductName"];  ?></option>
                                <?php endforeach; ?>
                            </select>

                            <select name="givenDutyFreeID" required>
                              <option value="None" selected>- no duty free selected -</option>
                                <?php foreach($dutyfrees as $dutyfree): ?> 
                                         <option value="<?php echo $dutyfree["ProductID"]; ?>"><?php echo $dutyfree["ProductName"];  ?></option>
                                <?php endforeach; ?>
                            </select>

                            </div>

    </form>

</div>
    
    
  

<div id="Custom-form-stepone">
    <form action="?page=bookingTwo" method="post">
  
    <div id="Custom-form-left">
        <label>Destination</label> <br> <input type="text" name="givenCustomDestination" placeholder="Enter preferred destinations" tabindex="1" required> <a href="http://localhost/TrollAirTours-Client/?page=about" target="blank">(Info)</a><br>
        <label>Date</label> <br> <input type="text" name="givenPreferredDate" placeholder="Enter pref. (DD-MM-YYYY)" max="31-12-2030" min="10-12-2015" tabindex="2" required><a href="http://localhost/TrollAirTours-Client/?page=home" target="blank">(Tour Season)</a><br>
        <label>Time</label> <br> <input type="text" name="givenPreferredTime" placeholder="Enter preferred (hh:mm)" max="23:59" min="00:00" tabindex="3" required><br>                                                  
    <label>Guide</label> <br> <select id="DropdownGuide" type="email" name="givenGuide" placeholder="Select language" tabindex="4" required>
     <option disabled selected> -- Select language -- </option>
            <option value="None" >No guide</option>
            <option value="English" >English</option>
            <option value="Norwegian">Norwegian</option>
            <option value="Chinese">Chinese</option>
            <option value="Spanish">Spanish</option>
            <option value="French">French</option>
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
                            <div id="preDefTourNext"><a href="javascript:{}" onclick="document.getElementById('bookingTwo').submit();"><h3>Next</h3></a></div>
                            <div id="customNext"><a href="?page=bookingCustom" onclick="document.getElementById('bookingCustom').submit();"><h3>Next</h3></a></div>
                        </li>
                        
                    </ul>
                </div>
                     

    


