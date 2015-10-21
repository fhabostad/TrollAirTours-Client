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
        
        
     //   $this->render("bookingsteptwo");   
          
          
          
          
       if ($page == "bookingOne") {
           $this->showBookingAction(1);
       }else if(($page == "bookingTwo")){
           $this->showBookingAction(2);
       }else if(($page == "bookingThree")){
           $this->showBookingAction(3);
       }else if(($page == "bookingFour")){
           $this->showBookingAction(4);
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
                 $productModel = $GLOBALS["productModel"];
                 $products = $productModel->getAll();
                 
                  $foods = $productModel->getAllWhereProductType(array("Food"));
                  $drinks = $productModel->getAllWhereProductType(array("Drink"));
                  $dutyfrees = $productModel->getAllWhereProductType(array("DutyFree"));
        
                 
                   $data = array(
                   "foods" => $foods,
                   "drinks" => $drinks,
                   "dutyfrees" => $dutyfrees,
                    );
                
                 $flightModel = $GLOBALS["flightModel"];
                 $flights = $flightModel->getAll();
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
                return $this->render("bookingstepOne",$data);
                
                
                
                break;
           
            case '2':
                
            $_SESSION["givenFoodID"]  =  $_REQUEST["givenFoodID"];
            $_SESSION["givenDrinkID"]  = $_REQUEST["givenDrinkID"];
            $_SESSION["givenDutyFreeID"]   = $_REQUEST["givenDutyFreeID"];
                
                
                return $this->render("bookingstepTwo");
                
                
                break;
            
            case '3':
                // hente inn data FRA setereservasjon her!
                
                
                 return $this->render("bookingstepThree");
                
                 break;
             
             case '4':
                $givenGender        = $_REQUEST["givenGender"];
                $givenFirst_name    = $_REQUEST["givenFirst_name"];
                $givenLast_name     = $_REQUEST["givenLast_name"];
                $givenStreet_address= $_REQUEST["givenStreet_address"];
                $givenZip_code      = $_REQUEST["givenZip_code"];
                $givenCity          = $_REQUEST["givenCity"];
                $givenCountry       = $_REQUEST["givenCountry"];
                $givenCountry_code  = $_REQUEST["givenCountry_code"];
                $givenPhone_number  = $_REQUEST["givenPhone_number"];
                $givenEmail         = $_REQUEST["givenEmail"];
                
                                
                $_SESSION["givenGender"]            = $givenGender;
                $_SESSION["givenFirst_name"]        = $givenFirst_name;
                $_SESSION["givenLast_name"]         = $givenLast_name;
                $_SESSION["givenStreet_address"]    = $givenStreet_address;
                $_SESSION["givenZip_code"]          = $givenZip_code;
                $_SESSION["givenCity"]              = $givenCity;
                $_SESSION["givenCountry"]           = $givenCountry;
                $_SESSION["givenCountry_code"]      = $givenCountry_code;
                $_SESSION["givenPhone_number"]      = $givenPhone_number;
                $_SESSION["givenEmail"]             = $givenEmail;
                
                
                $givenTourType        = $_REQUEST["givenTourType"];
                $givenFlightDate      = $_REQUEST["givenFlightDate"];
                $givenDeparture       = $_REQUEST["givenDeparture"];
                
                $_SESSION["givenTourType"]       = $givenTourType;
                $_SESSION["givenFlightDate"]     = $givenFlightDate;
                $_SESSION["givenDeparture"]      = $givenDeparture;


                echo $_SESSION["givenTourType"];
                echo $_SESSION["givenFlightDate"];
                echo $_SESSION["givenDeparture"];        
                
                 return $this->render("bookingstepFour");
                 break;
        
        }
        
        
        
        
        
    }
   
    
        
    
}