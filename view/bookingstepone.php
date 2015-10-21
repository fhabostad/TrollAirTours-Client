<?php
$calenderDatesGerianger = $GLOBALS["CalenderDatesGeiranger"];
$calenderDatesAakneset = $GLOBALS["CalenderDatesAakneset"];
$calenderDatesBriksdalen = $GLOBALS["CalenderDatesBriksdalen"];

$foods = $GLOBALS["foods"];
$drinks = $GLOBALS["drinks"];
$dutyfrees = $GLOBALS["dutyfrees"];
?>

<div id="main-top-booking">



<script>
   
function test()
{
    window.alert("yo");
}
   
   
function EnableSpecificDates(date) {


if(document.getElementById('Geiranger').checked) {
  var disableddates = [<?php foreach($calenderDatesGeiranger as $calenderDatesGeiranger){ echo  "\"$calenderDatesGeiranger\"" . ",";} ?>];
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


<form action="?page=bookingTwo" method="post">
                    <div id="product-form">
                        
                        <label for="inputProductID" >Products</label>
                        <select name="givenFoodID" required>
                           <option>Select food/snack</option>
                            <?php foreach($foods as $food): ?> 
                                     <option value="<?php echo $food["ProductID"]; ?>"><?php echo $food["ProductName"];  ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        <label for="inputDrinkID" PilotID</label>
                        <select name="givenDrinkID" required>
                           <option>Select drink</option>
                            <?php foreach($drinks as $drink): ?> 
                           <option value="<?php echo $drink["ProductID"]; ?>"><?php echo $drink["ProductName"];  ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        <label for="inputDutyFreeID" PilotID</label>
                        <select name="givenDutyFreeID" required>
                           <option>Select duty free</option>
                            <?php foreach($dutyfrees as $dutyfree): ?> 
                                     <option value="<?php echo $dutyfree["ProductID"]; ?>"><?php echo $dutyfree["ProductName"];  ?></option>
                            <?php endforeach; ?>
                        </select>
</form>
                     
<div id="destination-buttons">
    <input type="radio" name="gender" id="Geiranger" value="Geiranger"> Geiranger </input>
    <input type="radio" name="gender" id="Briksdalen" value="Briksdalen"> Briksdalen </input>
    <input type="radio" name="gender" id="Aakneset" value="Aakneset"> Aakneset </input>
</div>
    
<div id="date-and-time">
    Date: <input type="text" id="datepicker">
    <select id="CuisineList" onclick="timedrop()"></select>
</div>

</div>  
