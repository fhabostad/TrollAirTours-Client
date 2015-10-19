<?php
$calenderDates = $GLOBALS["CalenderDates"];

?>





<script>
    function EnableSpecificDates(date) {
 var disableddates = [<?php foreach($calenderDates as $calenderDate)
{ 
echo  "\"$calenderDate\"" . ",";
} ?>];
            
   var disableddates2 = ["08.12.2015", "11.10.2016"];          
           
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
     dateFormat : "yy-mm-dd",
 beforeShowDay: EnableSpecificDates
 });
 });




</script>



<p>Date: <input type="text" id="datepicker"></p>