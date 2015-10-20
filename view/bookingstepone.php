<?php
$calenderDatesGerianger = $GLOBALS["CalenderDatesGeiranger"];
$calenderDatesAakneset = $GLOBALS["CalenderDatesAakneset"];
$calenderDatesBriksdalen = $GLOBALS["CalenderDatesBriksdalen"];
?>

<div id="main-top-booking">



<script>
   
function test()
{
    window.alert("yo");
}
   
   
function EnableSpecificDates(date) {


if(document.getElementById('Geiranger').checked) {
  var disableddates = [<?php foreach($calenderDatesGerianger as $calenderDateGerianger){ echo  "\"$calenderDateGerianger\"" . ",";} ?>];
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
 if ($.inArray(currentdate, disableddates) != -1 ) {
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


<input type="radio" name="gender" id="Geiranger" value="Geiranger"> Geiranger </input>
<input type="radio" name="gender" id="Briksdalen" value="Briksdalen"> Briksdalen </input>
<input type="radio" name="gender" id="Aakneset" value="Aakneset"> Aakneset </input>

<p>Date: <input type="text" id="datepicker"></p>


<select id="CuisineList" onclick="timedrop()"></select>


                    
