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
        $flightDatesGeiranger = $flightModel->getAllDatesFor("Geiranger");
        $flightDatesAakneset = $flightModel->getAllDatesFor("Aakneset");
        $flightDatesBriksdalen = $flightModel->getAllDatesFor("Briksdalen");
        
        $dateArrayGeiranger = array(); 
        foreach($flightDatesGeiranger as $flightDateGeiranger){
            array_push($dateArrayGeiranger, $flightDateGeiranger["FlightDate"]);         
        }
        
        $GLOBALS["CalenderDatesGeiranger"] = $dateArrayGeiranger;
        
        $dateArrayAakneset = array(); 
        foreach($flightDatesAakneset as $flightDateAakneset){
            array_push($dateArrayAakneset, $flightDateAakneset["FlightDate"]);         
        }
        
        $GLOBALS["CalenderDatesAakneset"] = $dateArrayAakneset;
        
        $dateArrayBriksdalen = array(); 
        foreach($flightDatesBriksdalen as $flightDateBriksdalen){
            array_push($dateArrayBriksdalen, $flightDateBriksdalen["FlightDate"]);         
        }
        
        $GLOBALS["CalenderDatesBriksdalen"] = $dateArrayBriksdalen;
        
        
        
        
        $this->render("calender");
    }

}