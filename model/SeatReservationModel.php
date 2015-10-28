<?php

class SeatReservationModel {
    
    private $dbConn;

    const TABLE = "SeatReservation"; //seat reservation table
    const SELECT_QUERY = "SELECT * FROM " . SeatReservation::TABLE; //Select all from seat reservations 
    const INSERT_QUERY = "INSERT INTO " . SeatReservation::TABLE . " (SeatNumber, CustomerID , BookingID, RegID, FlightID) VALUES (:SeatNumber,:CustomerID,:BookingID,:RegID,:FlightID)"; //Insert complete seat reservation from parameter
    const DELETE_QUERY = "DELETE FROM" . SeatReservation::TABLE . " WHERE FlightID= ?"; //Delete seat reservation where SeatNumber equals given parameter
    

    private $selStmt;
    private $addStmt;
    private $delStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(SeatReservationModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(SeatReservationModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(SeatReservationModel::DELETE_QUERY);
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
    
}