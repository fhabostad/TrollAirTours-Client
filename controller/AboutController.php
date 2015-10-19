<?php

require_once("Controller.php");

// Represents home page
class AboutController extends Controller {

    /**
     * Render "Home" View
     *
     * @param string $page
     */
    public function show($page) {
        $flightModel = $GLOBALS["flightModel"];
        $flightDates = $flightModel->getAllDates();
        
        $dateArray = array(); 
        foreach($flightDates as $flightDate){
            array_push($dateArray, $flightDate["FlightDate"]);
            
        }
        
        $GLOBALS["CalenderDates"] = $dateArray;
        
        
        $this->render("calender");
    }

}