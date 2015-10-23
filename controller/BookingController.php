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
       }else if(($page == "bookingCustom")){
           $this->showBookingAction(5);
       }else if(($page == "bookingThreeUpdate")){
           $this->showBookingAction(6);
       }
    }



    private function showBookingAction($casevalue) {
        // Find "customerName" parameter in request,
        
        
        
        $this->initSession();
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
            $productModel = $GLOBALS["productModel"];
                
            $_SESSION["givenFoodID"]     = filter_input(INPUT_POST, "givenFoodID");
            $_SESSION["givenDrinkID"]    = filter_input(INPUT_POST, "givenDrinkID");
            $_SESSION["givenDutyFreeID"] = filter_input(INPUT_POST, "givenDutyFreeID");
            
            $foodID = $productModel->getAllWhereProductID($_SESSION["givenFoodID"]);
            $drinkID = $productModel->getAllWhereProductID($_SESSION["givenDrinkID"]);
            $dutyFreeID = $productModel->getAllWhereProductID($_SESSION["givenDutyFreeID"]);
            
            foreach($foodID as $food)
            {
                $_SESSION["givenFoodName"] = $food["ProductName"];
            }
            
            foreach($drinkID as $drink)
            {
                $_SESSION["givenDrinkName"] = $drink["ProductName"];
            }
            
            foreach($dutyFreeID as $dutyfree)
            {
                $_SESSION["givenDutyFreeName"] = $dutyfree["ProductName"];
            }
           
            
            //Innhenting av data fra contact form
               $_SESSION["givenCustomDestination"]  = filter_input(INPUT_POST, "givenPreferredDate");
               $_SESSION["givenPreferredDate"]      = filter_input(INPUT_POST, "givenPreferredDate");
               $_SESSION["givenPreferredTime"]      = filter_input(INPUT_POST, "givenPreferredTime");
               $_SESSION["givenGuide"]              = filter_input(INPUT_POST, "givenGuide");

                
                
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
                $givenBirth_date    = $_REQUEST["givenBirth_date"];
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
                $_SESSION["givenBirth_date"]        = $givenBirth_date;
                $_SESSION["givenStreet_address"]    = $givenStreet_address;
                $_SESSION["givenZip_code"]          = $givenZip_code;
                $_SESSION["givenCity"]              = $givenCity;
                $_SESSION["givenCountry"]           = $givenCountry;
                $_SESSION["givenCountry_code"]      = $givenCountry_code;
                $_SESSION["givenPhone_number"]      = $givenPhone_number;
                $_SESSION["givenEmail"]             = $givenEmail;
                
                
              //  $givenTourType        = $_REQUEST["givenTourType"];
              //  $givenFlightDate      = $_REQUEST["givenFlightDate"];
              //  $givenDeparture       = $_REQUEST["givenDeparture"];
                
             //   $_SESSION["givenTourType"]       = $givenTourType;
             //   $_SESSION["givenFlightDate"]     = $givenFlightDate;
             //   $_SESSION["givenDeparture"]      = $givenDeparture;

                
             //   echo $_SESSION["givenTourType"];
             //   echo $_SESSION["givenFlightDate"];
            //    echo $_SESSION["givenDeparture"];        
                
             //  echo $_SESSION['givenGender'];
             //  echo $_SESSION['givenFirst_name'];
             //  echo $_SESSION['givenLast_name'];
             //  echo $_SESSION['givenStreet_address'];
             //  echo $_SESSION['givenZip_code'];
             //  echo $_SESSION['givenCity'];
             //  echo $_SESSION['givenCountry'];
             //  echo $_SESSION['givenCountry_code'];
             //  echo $_SESSION['givenPhone_number'];
             //  echo $_SESSION['givenEmail'];
               
                             
                 return $this->render("bookingstepFour");
                 break;
             
             case '5':
                //Innhenting av data fra contact form
                $givenCustomDestination  = $_REQUEST["givenCustomDestination"];
                $givenPreferredDate      = $_REQUEST["givenPreferredDate"];
                $givenPreferredTime      = $_REQUEST["givenPreferredTime"];
                $givenGuide              = $_REQUEST["givenGuide"];
                                               
                $_SESSION["givenCustomDestination"] = $givenCustomDestination;
                $_SESSION["givenPreferredDate"]     = $givenPreferredDate;
                $_SESSION["givenPreferredTime"]     = $givenPreferredTime;
                $_SESSION["givenGuide"]             = $givenGuide;
                                               
                //test av funksjonalitet stepone custom form
                echo $_SESSION["givenCustomDestination"];
                echo $_SESSION["givenPreferredDate"];
                echo $_SESSION["givenPreferredTime"];
                echo $_SESSION["givenGuide"];
                
                return $this->render("bookingCustom");
                break;
            
             case '6':
                 return $this->render("bookingstepThreeUpdate");
                 break;
        }
                    
        
        
        
    }
    
       
    function initSession()
    {
        session_start();
        
        if(!isset($_SESSION["givenFirst_name"]))
        {
                $_SESSION["givenGender"]         = "";            
                $_SESSION["givenFirst_name"]     = "";   
                $_SESSION["givenLast_name"]      = "";    
                $_SESSION["givenBirth_date"]     = "";    
                $_SESSION["givenStreet_address"] = "";    
                $_SESSION["givenZip_code"]       = "";    
                $_SESSION["givenCity"]           = "";    
                $_SESSION["givenCountry"]        = "";   
                $_SESSION["givenCountry_code"]   = "";   
                $_SESSION["givenPhone_number"]   = "";    
                $_SESSION["givenEmail"]          = "";    
           
        }
       
    }
   
       
}
        
    
