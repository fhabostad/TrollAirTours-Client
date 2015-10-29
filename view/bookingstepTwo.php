<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
        


<div id="main-top-booking">
    <div id="main-top-overlay-booking">
<div id="planechart">
    <ul class="select-seat-row-one">
        <li>
            <input type="radio" id="A1" value="A1" name="seatnumber" <?php echo ($seatnumbers['seatnumber'] == "A1" ? 'checked="checked"': ''); ?>/>
            <label for="A1">A1</label>
        </li>
        <li>
            <input type="radio" id="A2" value="A2" name="seatnumber"/>
            <label for="A2">A2</label>
        </li>
        <li>
            <input type="radio" id="A3" value="A3" name="seatnumber"/>
            <label for="A3">A3</label>
        </li>
        <li>
            <input type="radio" id="A4" value="A4" name="seatnumber"/>
            <label for="A4">A4</label>
        </li>
        <li>
            <input type="radio" id="A5" value="A5" name="seatnumber"/>
            <label for="A5">A5</label>
        </li>
        <li>
            <input type="radio" id="A6" value="A6" name="seatnumber"/>
            <label for="A6">A6</label>
        </li>
    </ul>
     <ul class="select-seat-row-two">
        <li>
            <input type="radio" id="B1" value="B1" name="seatnumber"/>
            <label for="B1">B1</label>
        </li>
        <li>
            <input type="radio" id="B2" value="B2" name="seatnumber"/>
            <label for="B2">B2</label>
        </li>
        <li>
            <input type="radio" id="B3" value="B3" name="seatnumber"/>
            <label for="B3">B3</label>
        </li>
        <li>
            <input type="radio" id="B4" value="B4" name="seatnumber"/>
            <label for="B4">B4</label>
        </li>
        <li>
            <input type="radio" id="B5" value="B5" name="seatnumber"/>
            <label for="B5">B5</label>
        </li>
        <li>
            <input type="radio" id="B6" value="B6" name="seatnumber"/>
            <label for="B6">B6</label>
        </li>
    </ul> 
</div>


   
        
 </div>
    
</div>
    
<div id="main-bottom-booking">
                    <ul>
                        <li id="previous-booking-step">
                            <a href="?page=bookingOne"> <h3>Previous</h3></a>
                        </li>
                        <li id="next-booking-step">
                             <a href="?page=bookingThree"> <h3>Next</h3></a>
                          <!-- <a href="javascript:{}" onclick="document.getElementById('bookingstepthree').submit();"><h3>Next</h3></a>-->
                        </li>
                        
                    </ul>
                </div>