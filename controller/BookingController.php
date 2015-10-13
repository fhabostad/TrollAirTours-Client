<?php

require_once("Controller.php");

// Represents home page
class BookingController extends Controller {

    /**
     * Render "Home" View
     *
     * @param string $page
     */
   // public function show($page) {
   //    $this->render("BookingStepOne");
      
   // }
    
      public function show($page) {
        if ($page == "addCustomer") {
            $this->addCustomerAction(1);
        } else if ($page == "bookingOne") {
           $this->showBookingAction(1);
       }else if(($page == "bookingTwo")){
           $this->showBookingAction(2);
       }else if(($page == "bookingThree")){
           $this->showBookingAction(3);
       }
    }



    private function showBookingAction($casevalue) {
        // Find "customerName" parameter in request,
        
        
        
        session_start();
            // Try to add new customer, Set action response code - success or not
        /** @var CustomerModel $customerModel */
       // $customerModel = $GLOBALS["customerModel"];
        //$added = $customerModel->add($givenGender,$givenFirst_name,$givenLast_name, $givenPhone_number);

        // Render the page
        //$data = array(
        //    "added" => $added,
        //    "givenFirst_name" => $givenFirst_name
       // );
        switch($casevalue)
        {
            case '1':
                return $this->render("bookingstepOne");
                
                
                
                break;
           
            case '2':
                $givenGender        = $_REQUEST["givenGender"];
                $givenFirst_name    = $_REQUEST["givenFirst_name"];
                $givenLast_name     = $_REQUEST["givenLast_name"];
                $givenStreet_address= $_REQUEST["givenStreet_address"];
                $givenZip_code      = $_REQUEST["givenZip_code"];
                $givenCity          = $_REQUEST["givenCity"];
                $givenCountry       = $_REQUEST["givenCountry"];
                $givenArea_code     = $_REQUEST["givenArea_code"];
                $givenPhone_number  = $_REQUEST["givenPhone_number"];
                $givenEmail         = $_REQUEST["givenEmail"];
                
                                
                $_SESSION["givenGender"]            = $givenGender;
                $_SESSION["givenFirst_name"]        = $givenFirst_name;
                $_SESSION["givenLast_name"]         = $givenLast_name;
                $_SESSION["givenStreet_address"]    = $givenStreet_address;
                $_SESSION["givenZip_code"]          = $givenZip_code;
                $_SESSION["givenCity"]              = $givenCity;
                $_SESSION["givenCountry"]           = $givenCountry;
                $_SESSION["givenArea_code"]         = $givenArea_code;
                $_SESSION["givenPhone_number"]      = $givenPhone_number;
                $_SESSION["givenEmail"]             = $givenEmail;
                
                
                //echo $_SESSION["givenGender"];
                
                return $this->render("bookingstepTwo");
                
                break;
            
            case '3':
                
        
        }
        
        
        
        
        
    }
   
    
        
    
}