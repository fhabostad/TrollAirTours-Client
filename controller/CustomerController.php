<?php

require_once("Controller.php");

class CustomerController extends Controller {

      /**
     * Shows all possible pages
     * @param string $page
     */
    public function show($page) {
        if ($page == "addCustomer") {
            $this->addCustomerAction();
        } else if ($page == "customer") {
            $this->showCustomerAction();
        }
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
    
    
    private function addCustomerAction() {
        // Find "customerName" parameter in request,
        $givenGender = $_REQUEST["givenGender"];
        $givenFirst_name = $_REQUEST["givenFirst_name"];
        $givenLast_name = $_REQUEST["givenLast_name"];
        $givenPhone_number = $_REQUEST["givenPhone_number"];
        if (!$givenFirst_name) {
            // No customer name supplied, redirect to customer list
            return $this->showCustomersAction();
        }

        // Try to add new customer, Set action response code - success or not
        /** @var CustomerModel $customerModel */
        $customerModel = $GLOBALS["customerModel"];
        $added = $customerModel->add($givenGender,$givenFirst_name,$givenLast_name, $givenPhone_number);

        // Render the page
        $data = array(
            "added" => $added,
            "givenFirst_name" => $givenFirst_name
        );
        return $this->render("customerAdd", $data);
    }
   
    
        
    
}