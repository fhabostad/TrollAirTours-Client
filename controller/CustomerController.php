<?php

require_once("Controller.php");

class CustomerController extends Controller {

      /**
     * Shows all possible pages
     * @param string $page
     */
    public function show($page) {
    //    if ($page == "addCustomer") {
    //      $this->addCustomerAction();
    //  } else if ($page == "customer") {
    //       $this->showCustomerAction();
    //    }
    }
    
    
    private function showCustomerAction() {
        $customerModel = $GLOBALS["customerModel"];
       $customers = $customerModel->getAll();


        $tempCustomerName = isset($_REQUEST["customerName"]) ? $_REQUEST["customerName"] : "";
        $customerName = htmlspecialchars($tempCustomerName);
        
        $data = array(
            "customers" => $customers,
            "customerName" => $customerName,
            
        );
        
        return $this->render("customer", $data);
    }
    
    
   /* private function addCustomerAction() {
        // Find "customerName" parameter in request,
        
        
        
   //     session_start();
            // Try to add new customer, Set action response code - success or not
        /** @var CustomerModel $customerModel */
       // $customerModel = $GLOBALS["customerModel"];
        //$added = $customerModel->add($givenGender,$givenFirst_name,$givenLast_name, $givenPhone_number);

        // Render the page
        //$data = array(
        //    "added" => $added,
        //    "givenFirst_name" => $givenFirst_name
       // );
     /*   switch($casevalue)
        {
            case '1':
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

                echo$_SESSION["givenGender"];            
                echo$_SESSION["givenFirst_name"];       
                echo$_SESSION["givenLast_name"];        
                echo$_SESSION["givenStreet_address"];
                echo$_SESSION["givenCity"];
                echo$_SESSION["givenZip_code"];          
                echo$_SESSION["givenCountry"];        
                echo$_SESSION["givenArea_code"];         
                echo$_SESSION["givenPhone_number"];      
                echo$_SESSION["givenEmail"];
                
                return $this->render("bookingsteptwo");
                break;
           
            case '2':
        
        }
        
        
        
        
    }
   
    
       */ 
    
}