<?php

class SeatReservationModel {
    
    private $dbConn;

    const TABLE = "SeatReservation"; //seat reservation table
    const SELECT_QUERY = "SELECT * FROM " . SeatReservationModel::TABLE; //Select all from seat reservations 
    const SELECT_SEATS_QUERY = "SELECT * FROM " . SeatReservationModel::TABLE . " WHERE FlightID= ?";
    const INSERT_QUERY = "INSERT INTO " . SeatReservationModel::TABLE . " (SeatNumber, CustomerID , BookingID, RegID, FlightID) VALUES (:SeatNumber,:CustomerID,:BookingID,:RegID,:FlightID)"; //Insert complete seat reservation from parameter
    
    
    

    private $selStmt;
    private $selSeatsStmt;
    private $delStmt;
    private $selWhereSeatStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(SeatReservationModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(SeatReservationModel::SELECT_QUERY);
        $this->selSeatsStmt = $this->dbConn->prepare(SeatReservationModel::SELECT_SEATS_QUERY);
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
    
    public function add($givenSeatNumber, $givenCutomerID, $givenBookingID, $givenRegID ,$givenFlightID) {
      $this->addStmt->execute(array("SeatNumber" => $givenSeatNumber, "CustomerID" => $givenCutomerID, "BookingID" => $givenBookingID, "RegID" => $givenRegID, "FlightID" => $givenFlightID));
    }
      
}
    