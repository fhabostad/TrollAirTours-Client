<?php

require_once("Controller.php");

class BookingController extends Controller {

    /*
     * Checks if $page is set to one of the booking sites. If that is true runs 
     * showBookingAction with the equivalent number.
     */
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


/*
 * Runs initSession() to start a new Session or to clear existing session variables.
 * Contains all booking actions and is split into one case for each booking step.
 */
    private function showBookingAction($casevalue) {

    $this->initSession();
        
    switch($casevalue)
    {
        
        //Runs showBookingOne() function
        case '1':
                
                 $this->showBookingOne();   
            break;
           
        //Runs showBookingTwo() function        
        case '2':
            
                 $this->showBookingTwo();
            break;

         //Runs showBookingThree() function
        case '3':
            
                 $this->showBookingThree();
            break;
 
         //Runs showBookingFour() function        
        case '4':
            
                 $this->showBookingFour();
            break;

         //Runs showBookingCustom() function        
        case '5':
            
                 $this->showBookingCustom();
            break;
              
         //Runs showBookingConfirmation() function        
        case '6':
            
                 $this->showBookingConfirmation();
            break;  
              
         //Runs showBookingCustomSummary() function               
        case '7':
                
                 $this->showBookingCustomSummary();
            break;

        //Runs showBookingSuccess() function               
        case '8':
            
                 $this->showBookingSuccess();   
            break;
        }
    }
    
       
    /*
     * Starts a new Session and clears session attributes
     */
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
    
    /*
     * Retrieves product model and flight model. Fetches the various data from both models.
     * Makes some of the variables GLOBAL and then renders the view and the model data.
     * #GLOBALS $FlightDateAndTimes
     * #GLOBALS $dateArrayGeiranger
     * #GLOBALS $dateArrayAakneset
     * #GLOBALS $dateArrayBriksdalen
     * #RENDER bookingstepOne
     * #MODELDATA product array
     */
    function showBookingOne()
    {
            $productModel = $GLOBALS["productModel"]; //Gets the product model
            $foods = $productModel->getAllWhereProductType(array("Food")); //Fetches an array of all Food products
            $drinks = $productModel->getAllWhereProductType(array("Drink")); //Fetches an array of all Drink products
            $dutyfrees = $productModel->getAllWhereProductType(array("DutyFree")); //Fetches an array of all Dutyfree products

            $data = array( //Puts food,drink and dutyfree in a array variable
            "foods" => $foods,
            "drinks" => $drinks,
            "dutyfrees" => $dutyfrees,

             );

            $flightModel = $GLOBALS["flightModel"]; //Get the flight model
            $FlightDateAndTimes = $flightModel->getAllDatesAndTimes(); //Fetches all dates and times

            $GLOBALS["flightDateAndTimes"] = $FlightDateAndTimes; //Makes variable GLOBAL

            $flightDatesGeiranger = $flightModel->getAllDatesFor("Geiranger"); //Fetches all dates for Geiranger
            $flightDatesAakneset = $flightModel->getAllDatesFor("Aakneset"); //Fetches all dates for Aakneset
            $flightDatesBriksdalen = $flightModel->getAllDatesFor("Briksdalen"); //Fetches all dates for Briksdalen

            $dateArrayGeiranger = array(); //Creates an array for Geiranger
                foreach($flightDatesGeiranger as $flightDateGeiranger){
                    array_push($dateArrayGeiranger, $flightDateGeiranger["FlightDate"]); //Foreach loop that puts all flight dates to Geiranger in a array         
                }
            $GLOBALS["CalenderDatesGeiranger"] = $dateArrayGeiranger; //Makes the array GLOBAL

            $dateArrayAakneset = array();  //Creates an array for Aakneset
                foreach($flightDatesAakneset as $flightDateAakneset){
                    array_push($dateArrayAakneset, $flightDateAakneset["FlightDate"]);  //Foreach loop that puts all flight dates to Aakneset in a array           
                }
            $GLOBALS["CalenderDatesAakneset"] = $dateArrayAakneset; //Makes the array GLOBAL

            $dateArrayBriksdalen = array();  //Creates an array for Briksdalen
                foreach($flightDatesBriksdalen as $flightDateBriksdalen){
                    array_push($dateArrayBriksdalen, $flightDateBriksdalen["FlightDate"]);  //Foreach loop that puts all flight dates to Briksdalen in a array           
                }
            $GLOBALS["CalenderDatesBriksdalen"] = $dateArrayBriksdalen; //Makes the array GLOBAL


            return $this->render("bookingstepOne",$data); //Takes view part (bookingstepOne) and model part (data) and renders the page content
    }
    
    /*
     * Retrieves product model, flight model and seat reservation model. Retrieves input from 
     * bookingstepOne and makes them into $_SESSION variables to store them between sites.
     * Checks if the order contains products, if that is true it gets product ID and product Price.
     * It then renders the view and the model data.
     * #RENDER bookingstepTwo
     * #MODELDATA taken seats array
     */
    function showBookingTwo()
    {
            $productModel = $GLOBALS["productModel"]; //Gets the product model
            $flightModel = $GLOBALS["flightModel"]; //Gets the flight model
            $SeatReservationModel = $GLOBALS["seatReservationModel"]; //Gets the seat reservation model
            
            $_SESSION["givenDestination"]     = filter_input(INPUT_POST, "givenDestination"); //Destination input 
            $_SESSION["selectedFlightID"]     = filter_input(INPUT_POST, "selectedFlightID"); //FlightID input 
            $_SESSION["givenDate"]            = filter_input(INPUT_POST, "givenDate"); //Date input 
            $_SESSION["givenTotalPrice"]      = filter_input(INPUT_POST, "givenTotalPrice"); //Total price input 
            $_SESSION["givenPrice"]           = filter_input(INPUT_POST, "givenPrice"); //Price input 
            
            $FlightIDs = $flightModel->getTimeForFlightID($_SESSION["selectedFlightID"]); //Fetches time for the given flight ID
            if(isset($FlightIDs[0])){  //Checks if the FlightIDs array contains a flight ID
                $FlightID = $FlightIDs[0]; //Sets the variable as the first element in the array
            }
            
            $_SESSION["givenTime"] = $FlightID["Departure"]; //Sets FlightID as givenTime 
             
            $_SESSION["givenFoodID"]            = filter_input(INPUT_POST, "givenFoodID"); //FoodID input
            $_SESSION["givenDrinkID"]           = filter_input(INPUT_POST, "givenDrinkID"); //DrinkID input
            $_SESSION["givenDutyFreeID"]        = filter_input(INPUT_POST, "givenDutyFreeID"); //DutyFreeID input
            $_SESSION["givenProductPrice"]      = filter_input(INPUT_POST, "givenProductPrice"); //ProductPrice input
            
            $foodID         = $productModel->getAllWhereProductID($_SESSION["givenFoodID"]); //Fetches all products with given FoodID
            $drinkID        = $productModel->getAllWhereProductID($_SESSION["givenDrinkID"]); //Fetches all products with given DrinkID
            $dutyFreeID     = $productModel->getAllWhereProductID($_SESSION["givenDutyFreeID"]); //Fetches all products with given DutyFreeID
            
            $foodPrice      = $productModel->getPriceWhereProductID($_SESSION["givenFoodID"]); //Fetches all product prices with given FoodID
            $drinkPrice     = $productModel->getPriceWhereProductID($_SESSION["givenDrinkID"]); //Fetches all product prices with given DrinkID
            $dutyFreePrice  = $productModel->getPriceWhereProductID($_SESSION["givenDutyFreeID"]); //Fetches all product prices with given DutyFreeID
            
           
            if(isset($foodPrice[0])){ //Checks if the foodPrice array contains a element
                $food = $foodPrice[0]; //Sets the variable as the first element in the array
                $_SESSION["givenFoodPrice"] =  $food["ProductPrice"]; //Sets givenFoodPrice as ProductPrice
                              
            }else 
            {
                $_SESSION["givenFoodPrice"] = 0; //If there is no element, the variable is set to 0
            }
            
                               
            if(isset($foodID[0])){ //Checks if the foodID array contains a element
                $food = $foodID[0]; //Sets the variable as the first element in the array
                $_SESSION["givenFoodName"] =  $food["ProductName"]; //Sets givenFoodName as ProductName 
                              
            }else
            {
                $_SESSION["givenFoodName"] = "None"; //If there is no element, the variable is set to None
            }
            
             if(isset($drinkPrice[0])){ //Checks if the drinkPrice array contains a element
                $drink = $drinkPrice[0]; //Sets the variable as the first element in the array
                $_SESSION["givenDrinkPrice"] =  $drink["ProductPrice"]; //Sets givenDrinkPrice as ProductPrice
                              
            }else
            {
                $_SESSION["givenDrinkPrice"] = 0; //If there is no element, the variable is set to 0
            }          
            
            if(isset($drinkID[0])){ //Checks if the drinkID array contains a element
                $drink = $drinkID[0]; //Sets the variable as the first element in the array
                $_SESSION["givenDrinkName"] = $drink["ProductName"]; //Sets givenDrinkName as ProductName
            }else
            {
                $_SESSION["givenDrinkName"] = "None"; //If there is no element, the variable is set to None
            }
            if(isset($dutyFreePrice[0])){ //Checks if the dutyFreePrice array contains a element
                $dutyfree = $dutyFreePrice[0]; //Sets the variable as the first element in the array
                $_SESSION["givenDutyFreePrice"] =  $dutyfree["ProductPrice"]; //Sets givenDutyFreePrice as ProductPrice
                              
            }else
            {
                $_SESSION["givenDutyFreePrice"] = 0; //If there is no element, the variable is set to 0
            }          
            
            if(isset($dutyFreeID[0])){ //Checks if the dutyFreeID array contains a element
                $dutyfree = $dutyFreeID[0]; //Sets the variable as the first element in the array
                $_SESSION["givenDutyFreeName"] = $dutyfree["ProductName"]; 
            }else
            {
                $_SESSION["givenDutyFreeName"] = "None"; //If there is no element, the variable is set to None
            }

            $_SESSION["givenCustomDestination"]  = filter_input(INPUT_POST, "givenPreferredDate"); //Preferred date input
            $_SESSION["givenPreferredDate"]      = filter_input(INPUT_POST, "givenPreferredDate"); //Preferred date input
            $_SESSION["givenPreferredTime"]      = filter_input(INPUT_POST, "givenPreferredTime"); //Preferred time input
            $_SESSION["givenGuide"]              = filter_input(INPUT_POST, "givenGuide"); //Guide language input

            $takenSeats = $SeatReservationModel->getAllSeatsByFlight($_SESSION["selectedFlightID"]);  //Fetches seats taken for the given flight ID

            $data = array( //Puts taken seats in a array variable
                "takenSeats" => $takenSeats,
            );

             return $this->render("bookingstepTwo", $data ); //Takes view part (bookingstepTwo) and model part (data) and renders the page content
    }
    
    /*
     * Gets the chosen seat number and makes it a SESSION variable and renders next booking step
     * #RENDER bookingstepThree
     */
    function showBookingThree()
    {
            $_SESSION["givenSeatNumber"]         = filter_input(INPUT_POST, "givenSeatNumber"); //Seat number input
            return $this->render("bookingstepThree"); //Takes view part (bookingstepThree) and renders the page
    }
    
    /*
     * Retrieves input from bookingstepThree and makes them into $_SESSION variables
     * and renders next booking step
     * #RENDER bookingstepFour
     */
    function showBookingFour()
    {
            $_SESSION["givenGender"]         = filter_input(INPUT_POST, "givenGender"); //Gender input
            $_SESSION["givenFirst_name"]     = filter_input(INPUT_POST, "givenFirst_name"); //First name input
            $_SESSION["givenLast_name"]      = filter_input(INPUT_POST, "givenLast_name"); //Last name input
            $_SESSION["givenBirth_date"]     = filter_input(INPUT_POST, "givenBirth_date"); //Birth date input
            $_SESSION["givenStreet_address"] = filter_input(INPUT_POST, "givenStreet_address"); //Street address input
            $_SESSION["givenZip_code"]       = filter_input(INPUT_POST, "givenZip_code"); //Zip code input
            $_SESSION["givenCity"]           = filter_input(INPUT_POST, "givenCity"); //City input
            $_SESSION["givenCountry"]        = filter_input(INPUT_POST, "givenCountry"); //Country input
            $_SESSION["givenCountry_code"]   = filter_input(INPUT_POST, "givenCountry_code"); //Country code input
            $_SESSION["givenPhone_number"]   = filter_input(INPUT_POST, "givenPhone_number"); //Phone number input
            $_SESSION["givenEmail"]          = filter_input(INPUT_POST, "givenEmail"); //Email input
               
            return $this->render("bookingstepFour"); //Takes view part (bookingstepFour) and renders the page
    }
    
    
    /*
     * Retrieves input from bookingstepOne and makes them into $_SESSION variables
     * and renders next booking step
     * #RENDER bookingCustom
     */
    function showBookingCustom()
    {
            $_SESSION["givenCustomDestination"] = filter_input(INPUT_POST, "givenCustomDestination"); //Custom destination input
            $_SESSION["givenPreferredDate"]     = filter_input(INPUT_POST, "givenPreferredDate"); //Preferred date input
            $_SESSION["givenPreferredTime"]     = filter_input(INPUT_POST, "givenPreferredTime"); //Preferred time input
            $_SESSION["givenGuide"]             = filter_input(INPUT_POST, "givenGuide"); //Guide language input
                                               
            return $this->render("bookingCustom"); //Takes view part (bookingCustom) and renders the page
    }
    
    /*
     * Runs the function addBooking() and render next booking step 
     * then renders next booking step
     * #RENDER bookingConfirmationPDF
     */
    function showBookingConfirmation()
    {
            $this->addBooking();
            return $this->render("bookingConfirmationPDF"); //Takes view part (bookingConfirmationPDF) and renders the page
        
    }
    
    /*
     * Retrieves input from bookingstepOne and makes them into $_SESSION variables
     * and renders next booking step
     * #RENDER bookingCustomSummary
     */
    function showBookingCustomSummary()
    {
            $_SESSION["givenGender"]       = filter_input(INPUT_POST, "givenGender"); //Gender input
            $_SESSION["givenFirst_name"]   = filter_input(INPUT_POST, "givenFirst_name"); //First name input
            $_SESSION["givenLast_name"]    = filter_input(INPUT_POST, "givenLast_name"); //Last name input
            $_SESSION["givenBirth_date"]   = filter_input(INPUT_POST, "givenBirth_date"); //Birth date input
            $_SESSION["givenCompany"]      = filter_input(INPUT_POST, "givenCompany"); //Company input
            $_SESSION["givenEmail"]        = filter_input(INPUT_POST, "givenEmail"); //Email input
            $_SESSION["givenPhone_number"] = filter_input(INPUT_POST, "givenPhone_number"); //Phone number input
                
            return $this->render("bookingCustomSummary"); //Takes view part (bookingConfirmationPDF) and renders the page
    }
    
    
    /*
     * Runs the function showBookingSuccess() and render next booking step 
     *#RENDER bookingCustomSummary
     */
    function showBookingSuccess()
    {
            $this->addCustomBooking();
            return $this->render("bookingSuccess");
    }
    
    
    
    private function addBooking(){
            $customerModel = $GLOBALS["customerModel"];
            $_SESSION["CustomerID"] = $customerModel->add($_SESSION["givenGender"], $_SESSION["givenFirst_name"], $_SESSION["givenLast_name"], $_SESSION["givenStreet_address"], $_SESSION["givenCountry_code"], $_SESSION["givenPhone_number"], $_SESSION["givenCity"], $_SESSION["givenZip_code"],  $_SESSION["givenEmail"], $_SESSION["givenCountry"], $_SESSION["givenBirth_date"]);              

            $bookingModel = $GLOBALS["bookingModel"];
            $_SESSION["BookingID"] = $bookingModel->add($_SESSION["CustomerID"], "0");

             $flightModel = $GLOBALS["flightModel"];
            $regIDArray = $flightModel->getRegIDForFlight($_SESSION["selectedFlightID"]);
            if(isset($regIDArray[0]))
            {
             $row = $regIDArray[0];
             $regID = $row["RegID"];
            }
            $seatReservationModel = $GLOBALS["seatReservationModel"];
            $seatReservationModel->add($_SESSION["givenSeatNumber"], $_SESSION["CustomerID"], $_SESSION["BookingID"], $regID, $_SESSION["selectedFlightID"] );

            $seatReservation_ProductModel = $GLOBALS["seatReservation_ProductModel"];
            $seatReservation_ProductModel->add($_SESSION["givenSeatNumber"],  $_SESSION["givenFoodID"], $_SESSION["selectedFlightID"] );
            $seatReservation_ProductModel->add($_SESSION["givenSeatNumber"],  $_SESSION["givenDrinkID"], $_SESSION["selectedFlightID"] );
            $seatReservation_ProductModel->add($_SESSION["givenSeatNumber"],  $_SESSION["givenDutyFreeID"], $_SESSION["selectedFlightID"] );
   
   }
       

    private function addCustomBooking()
    {
        $customerModel = $GLOBALS["customerModel"];
        $name = $_SESSION["givenFirst_name"];
        $_SESSION["CustomerID"] = $customerModel->addCustom($_SESSION["givenCompany"],$name , $_SESSION["givenEmail"], $_SESSION["givenPhone_number"]);              

        $CustomerRequest = "Destination: " . $_SESSION["givenCustomDestination"] . ". Date: " . $_SESSION["givenPreferredDate"] . ". Time: " . $_SESSION["givenPreferredTime"] . " Language: " . $_SESSION["givenGuide"] . ".";
            
        $bookingModel = $GLOBALS["bookingModel"];
        $_SESSION["BookingID"] = $bookingModel->add($_SESSION["CustomerID"],$CustomerRequest);
    }
       
}
        
    
