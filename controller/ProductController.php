<?php

require_once("Controller.php");

// Represents home page
class ProductController extends Controller {

    /**
     * Render "Home" View
     *
     * @param string $page
     */
     public function show($page) {
        if ($page == "addProduct") {
            $this->addProductAction();
        } else if ($page == "product") {
            $this->showProductAction();
        }
    }
    

    private function showProductAction() {
        $productModel = $GLOBALS["$productModel"];
        $products = $productModel->getAll();


        $tempProductName = isset($_REQUEST["ProductName"]) ? $_REQUEST["ProductName"] : "";
        $ProductName = htmlspecialchars($tempProductName);
        
        $data = array(
            "products" =>  $products,
            "ProductName" => $ProductName,
            
        );
        
        return $this->render("products", $data);
    }
    
    
    private function addProductAction() {
        // Find "customerName" parameter in request,
        $givenProductName = $_REQUEST["givenProductName"];

        if (!$givenProductName) {
            // No customer name supplied, redirect to customer list
            return $this->showProductAction();
        }

        // Try to add new customer, Set action response code - success or not
        /** @var CustomerModel $customerModel */
        $productModel = $GLOBALS["productModel"];
        $added = $productModel->add($givenProductName);

        // Render the page
        $data = array(
            "added" => $added,
            "givenProductName" => $givenProductName,
        );
        return $this->render("productAdd", $data);
    }
   
    
        
    
}