<?php

// Controller layer - the router selects controller to use depending on URL and request parameters
class Router {

    /**
     * Returns the requested page name
     */
    public function getPage() {
        // Get page from request, or use default
        if (isset($_REQUEST["page"])) {
            $page = $_REQUEST["page"];
        } else {
            //$page = $GLOBALS["DEFAULT_PAGE"];
			$page = "home";
        }
        return $page;
    }

    //
    /**
     * Decide which page to show
     * @return Controller
     */
    public function getController() {
        $page = $this->getPage();
        switch ($page) {
            case "customers":
            case "addCustomer":
                return new CustomerController();
                
            case "bookingOne":
            case "bookingTwo":
            case "bookingThree":
                return new BookingController();
                
            case "about":
                return new AboutController();
            case "home":
            default:
                return new HomeController();
        }

    }

}