<?php

require_once("Controller.php");

// Represents home page
class AboutController extends Controller {

    /**
     * Render "Home" View
     *
     * @param string $page
     */
    public function show($page) {
        $this->render("about");
    }

}