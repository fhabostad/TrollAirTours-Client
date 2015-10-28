<?php

require_once("Controller.php");

class BookingController extends Controller {

    public function show($page) {
      
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
       }else if(($page == "bookingConfirmation")){
           $this->showBookingAction(6);
       }else if(($page == "bookingCustomSummary")){
           $this->showBookingAction(7);
       }else if(($page == "bookingSuccess")){
           $this->showBookingAction(8);
       }
    }



    private function showBookingAction($casevalue) {

        
        $this->initSession();
        
        switch($casevalue)
        {
            case '1':
 
                $this->showBookingOne();   
                
            break;
           
                
            case '2':
            $productModel = $GLOBALS["productModel"];
            $flightModel = $GLOBALS["flightModel"];
            
            
            $_SESSION["selectedFlightID"]     = filter_input(INPUT_POST, "selectedFlightID");
            $_SESSION["givenDate"]     = filter_input(INPUT_POST, "givenDate");    
            
            $FlightIDs = $flightModel->getTimeForFlightID( $_SESSION["selectedFlightID"] );
            $FlightID = $FlightIDs[0];
            
            $_SESSION["givenTime"] = $FlightID["Departure"];
             

                
            $_SESSION["givenFoodID"]     = filter_input(INPUT_POST, "givenFoodID");
            $_SESSION["givenDrinkID"]    = filter_input(INPUT_POST, "givenDrinkID");
            $_SESSION["givenDutyFreeID"] = filter_input(INPUT_POST, "givenDutyFreeID");
            
            
           
            $foodID = $productModel->getAllWhereProductID($_SESSION["givenFoodID"]);
          
            
            
            $drinkID = $productModel->getAllWhereProductID($_SESSION["givenDrinkID"]);
            $dutyFreeID = $productModel->getAllWhereProductID($_SESSION["givenDutyFreeID"]);
           
            echo $_SESSION["givenDate"] . "  " . $_SESSION["selectedFlightID"]  . "  " . $_SESSION["givenTime"] . " Food:" . $_SESSION["givenFoodID"];

            
            
            if(isset($foodID[0])){
                $food = $foodID[0];
                $_SESSION["givenFoodName"] = $food["ProductName"];  
            }else
            {
                $_SESSION["givenFoodName"] = "None";
            }
            
            if(isset($drinkID[0]))
            {
                $drink = $drinkID[0];
                $_SESSION["givenDrinkName"] = $drink["ProductName"];  
            }else
            {
                $_SESSION["givenDrinkName"] = "None";
            }
            
            if(isset($dutyFreeID[0]))
            {
                $dutyfree = $dutyFreeID[0];
                $_SESSION["givenDutyFreeName"] = $dutyfree["ProductName"]; 
            }else
            {
                $_SESSION["givenDutyFreeName"] = "None";
            }
               
                    
                   
           
            
            //Innhenting av data fra contact form
               $_SESSION["givenCustomDestination"]  = filter_input(INPUT_POST, "givenPreferredDate");
               $_SESSION["givenPreferredDate"]      = filter_input(INPUT_POST, "givenPreferredDate");
               $_SESSION["givenPreferredTime"]      = filter_input(INPUT_POST, "givenPreferredTime");
               $_SESSION["givenGuide"]              = filter_input(INPUT_POST, "givenGuide");

            
               
                
                return $this->render("bookingstepTwo");
 
               
            
            case '3':
                // hente inn data FRA setereservasjon her!
                
                
                 return $this->render("bookingstepThree");
                
                 break;
             
             case '4':
                $_SESSION["givenGender"]         = filter_input(INPUT_POST, "givenGender");
                $_SESSION["givenFirst_name"]     = filter_input(INPUT_POST, "givenFirst_name");
                $_SESSION["givenLast_name"]      = filter_input(INPUT_POST, "givenLast_name");
                $_SESSION["givenBirth_date"]     = filter_input(INPUT_POST, "givenBirth_date");
                $_SESSION["givenStreet_address"] = filter_input(INPUT_POST, "givenStreet_address");
                $_SESSION["givenZip_code"]       = filter_input(INPUT_POST, "givenZip_code");
                $_SESSION["givenCity"]           = filter_input(INPUT_POST, "givenCity");
                $_SESSION["givenCountry"]        = filter_input(INPUT_POST, "givenCountry");
                $_SESSION["givenCountry_code"]   = filter_input(INPUT_POST, "givenCountry_code");
                $_SESSION["givenPhone_number"]   = filter_input(INPUT_POST, "givenPhone_number");
                $_SESSION["givenEmail"]          = filter_input(INPUT_POST, "givenEmail");
                
                /*                
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
                */
            
                 return $this->render("bookingstepFour");
                 break;
             
             case '5':
                //Innhenting av data fra contact form
                $_SESSION["givenCustomDestination"] = filter_input(INPUT_POST, "givenCustomDestination");
                $_SESSION["givenPreferredDate"]     = filter_input(INPUT_POST, "givenPreferredDate");
                $_SESSION["givenPreferredTime"]     = filter_input(INPUT_POST, "givenPreferredTime");
                $_SESSION["givenGuide"]             = filter_input(INPUT_POST, "givenGuide");
                                               
//                $_SESSION["givenCustomDestination"] = $givenCustomDestination;
//                $_SESSION["givenPreferredDate"]     = $givenPreferredDate;
//                $_SESSION["givenPreferredTime"]     = $givenPreferredTime;
//                $_SESSION["givenGuide"]             = $givenGuide;
//                                               
//                //test av funksjonalitet stepone custom form
//                echo $_SESSION["givenCustomDestination"];
//                echo $_SESSION["givenPreferredDate"];
//                echo $_SESSION["givenPreferredTime"];
//                echo $_SESSION["givenGuide"];
                
                return $this->render("bookingCustom");
              
            
             case '6':
                 $this->addBooking();
                 return $this->render("bookingConfirmationPDF");
              
            case '7':
                
                $_SESSION["givenGender"]       = filter_input(INPUT_POST, "givenGender");
                $_SESSION["givenFirst_name"]   = filter_input(INPUT_POST, "givenFirst_name");
                $_SESSION["givenLast_name"]    = filter_input(INPUT_POST, "givenLast_name");
                $_SESSION["givenBirth_date"]   = filter_input(INPUT_POST, "givenBirth_date");
                $_SESSION["givenCompany"]      = filter_input(INPUT_POST, "givenCompany");
                $_SESSION["givenEmail"]        = filter_input(INPUT_POST, "givenEmail");
                $_SESSION["givenPhone_number"] = filter_input(INPUT_POST, "givenPhone_number");
                
//                echo $_SESSION["givenGender"]; 
//                echo $_SESSION["givenFirst_name"];    
//                echo $_SESSION["givenLast_name"];    
//                echo $_SESSION["givenBirth_date"];         
//                echo $_SESSION["givenCompany"];          
//                echo $_SESSION["givenEmail"];            
//                echo $_SESSION["givenPhone_number"];  
                
                return $this->render("bookingCustomSummary");
                break;
            case '8':
                
                return $this->render("bookingSuccess");
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
    
    
    
    function showBookingOne()
    {
        $productModel = $GLOBALS["productModel"]; //Gets the productmodel
        $foods = $productModel->getAllWhereProductType(array("Food")); //Fetches an array of all Food products
        $drinks = $productModel->getAllWhereProductType(array("Drink")); //Fetches an array of all Drink products
        $dutyfrees = $productModel->getAllWhereProductType(array("DutyFree")); //Fetches an array of all Dutyfree products
        $data = array( // Puts food,drink and dutyfree in a array variable
        "foods" => $foods,
        "drinks" => $drinks,
        "dutyfrees" => $dutyfrees,
         );
        
        $flightModel = $GLOBALS["flightModel"];
        $FlightDateAndTimes = $flightModel->getAllDatesAndTimes();
        
        $GLOBALS["flightDateAndTimes"] = $FlightDateAndTimes;
        
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
    }
        private function addBooking(){
        $customerModel = $GLOBALS["customerModel"];
        $_SESSION["CustomerID"] = $customerModel->add($_SESSION["givenGender"], $_SESSION["givenFirst_name"], $_SESSION["givenLast_name"], $_SESSION["givenStreet_address"], $_SESSION["givenCountry_code"], $_SESSION["givenPhone_number"], $_SESSION["givenCity"], $_SESSION["givenZip_code"],  $_SESSION["givenEmail"], $_SESSION["givenCountry"]);              
        
        $bookingModel = $GLOBALS["bookingModel"];
        $_SESSION["BookingID"] = $bookingModel->add($_SESSION["CustomerID"]);
        
       
   }
       
}
        
    
