<?php

class SeatReservation_ProductModel {
    
    private $dbConn;

    const TABLE = "SeatReservation_Product"; //seat reservation table
    const SELECT_QUERY = "SELECT * FROM " . SeatReservation_ProductModel::TABLE; //Select all from seat reservations 
    const SELECT_SEATS_QUERY = "SELECT * FROM " . SeatReservation_ProductModel::TABLE . " WHERE FlightID= ?";
    const INSERT_QUERY = "INSERT INTO " . SeatReservation_ProductModel::TABLE . " (SeatNumber, ProductID , FlightID) VALUES (:SeatNumber,:ProductID,:FlightID)"; //Insert complete seat reservation from parameter
    
    
    

    private $selStmt;
    private $selSeatsStmt;
    private $delStmt;
    private $selWhereSeatStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(SeatReservation_ProductModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(SeatReservation_ProductModel::SELECT_QUERY);
        $this->selSeatsStmt = $this->dbConn->prepare(SeatReservation_ProductModel::SELECT_SEATS_QUERY);
    }

    /**
     * Get all seat reservations stored in the DB
     * @return array in associative form
     */
    public function getAll() {
        // Fetch all seat reservations as associative arrays
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllSeatsByFlight($flightID) {
        $this->selSeatsStmt->execute(array($flightID));
        return $this->selSeatsStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function add($givenSeatNumber, $givenProductID, $givenFlightID) {
      $this->addStmt->execute(array("SeatNumber" => $givenSeatNumber, "ProductID" => $givenProductID, "FlightID" => $givenFlightID));
    }
      
}