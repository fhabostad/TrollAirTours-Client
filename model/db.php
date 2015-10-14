<?php

require_once("CustomerModel.php");
require_once("DateModel.php");

// TODO - change the DB connection here (if it's Microsoft SQL server or other non-MySQL DB)
// Create DB connection
$dbConn = new PDO("sqlsrv:Server=localhost;Database=BookingSystem", 'booking' , 'booking1234');


// Create data models
$customerModel = new CustomerModel($dbConn);
$dateModel = new DateModel($dbConn);
// TODO - create new models here. First create them as a new class
// TODO - once you have more model classes, perhaps some of the functions can be moved to a common parent class?