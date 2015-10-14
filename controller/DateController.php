<?php

require_once("Controller.php");

// Represents home page
class Date extends Controller {

    /**
     * Render "Home" View
     *
     * @param string $page
     */
    public function show($page) {
        $this->render("about");
    }
    
    private function showDateAction() {
        $dateModel = $GLOBALS["dateModel"];
        $employees = $employeeModel->getAll();


        $tempDate = isset($_REQUEST["FlightDate"]) ? $_REQUEST["FlightDate"] : "";
        $tempDate = htmlspecialchars($tempDate);
        
       $data = array(
            "employees" => $employees,
            "employeeID" => $employeeID,
            
        );
        
        return $this->render("employee", $data);
    }

}