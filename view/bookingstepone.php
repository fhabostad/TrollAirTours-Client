<?php
$calenderDatesGeiranger = $GLOBALS["CalenderDatesGeiranger"];
$calenderDatesAakneset = $GLOBALS["CalenderDatesAakneset"];
$calenderDatesBriksdalen = $GLOBALS["CalenderDatesBriksdalen"];

$foods = $GLOBALS["foods"];
$drinks = $GLOBALS["drinks"];
$dutyfrees = $GLOBALS["dutyfrees"];
?>

<div id="main-top-booking">
<div id="main-top-overlay-booking">


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
 
            
        
           
 var m = date.getMonth();
 var d = date.getDate();
 var y = date.getFullYear();
 
 var currentdate = d + "." + (m + 1) + "." + y; 
 for (var i = 0; i < disableddates.length; i++) {
 if ($.inArray(currentdate, disableddates) !== -1 ) {
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

 
 });

 function timedrop()
 {
    var cuisines = ["Chinese","Indian"];     

    var sel = document.getElementById('CuisineList');
    var fragment = document.createDocumentFragment();
    cuisines.forEach(function(cuisine, index) {
    var opt = document.createElement('option');
    opt.innerHTML = cuisine;
    opt.value = cuisine;
    fragment.appendChild(opt);
});
sel.appendChild(fragment);
 }




</script>



<div id="destination-buttons"> 
    <input type="radio" name="gender" id="Geiranger" value="Geiranger"> Geiranger </input>
    <input type="radio" name="gender" id="Briksdalen" value="Briksdalen"> Briksdalen </input>
    <input type="radio" name="gender" id="Aakneset" value="Aakneset"> Aakneset </input>
    <input type="radio" name="gender" id="Aakneset" value="Custom"> Custom </input>
</div>

<div id="date-and-time">
    Date: <input type="text" id="datepicker">
    <select id="CuisineList" onclick="timedrop()"></select>
</div>


<form action="?page=bookingTwo" id="bookingTwo" method="post">
                    <div id="product-form">
                        
                        <label for="inputProductID" >Select your desired products</label>
                        <select name="givenFoodID" required>
                            
                           <option value="">Select food/snack</option>
                             <option value="none">No food</option>
                            <?php foreach($foods as $food): ?> 
                                   
                                     <option value="<?php echo $food["ProductID"]; ?>"><?php echo $food["ProductName"];  ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        <select name="givenDrinkID" required>
                             
                           <option value="">Select drink</option>
                           <option value="none">No drink</option>
                            <?php foreach($drinks as $drink): ?> 
                           <option value="<?php echo $drink["ProductID"]; ?>"><?php echo $drink["ProductName"];  ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        <select name="givenDutyFreeID" required>
                           <option value="">Select duty free</option>
                           <option value="none">No duty free</option>
                            <?php foreach($dutyfrees as $dutyfree): ?> 
                                     <option value="<?php echo $dutyfree["ProductID"]; ?>"><?php echo $dutyfree["ProductName"];  ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        </div>
                
</form>

</div>
<!--   <div id="Custom-form-stepone">
    <form action="?page=bookingTwo" method="post">
    <h2>Custom Form</h2>
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
    <br>
    <button class="btn btn-default" type="submit">Next</button>
    </div>
    </form>
</div>-->
</div>
 
                <div id="main-bottom-booking">
                    <ul>
                        <li id="previous-booking-step">
                            <a href="#">
                                <h3>Previous</h3>
                            </a>
                        </li>
                        <li id="next-booking-step">
                            <a href="javascript:{}" onclick="document.getElementById('bookingTwo').submit();"><h3>Next</h3></a>
                        </li>
                        
                    </ul>
                </div>
                     

    


