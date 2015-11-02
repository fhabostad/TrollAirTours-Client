<?php

class FlightModel {
    
    private $dbConn;

    const TABLE = "Flight"; //Flight table
    const SELECT_QUERY = "SELECT * FROM " . FlightModel::TABLE; //Select all from Flight 
    const SELECT_TIME_WHERE_FLIGHTID_QUERY = "SELECT Departure FROM " . FlightModel::TABLE . " WHERE FlightID = ?";
    const SELECT_FLIGHTPRICE_WHERE_TOURTYPE = "SELECT FlightPrice FROM " . FlightModel::TABLE . " WHERE TourType = ?";
    const SELECT_DATE_QUERY = "SELECT FlightDate FROM " . FlightModel::TABLE . " WHERE SeatsAvailable>0 AND TourType = ?"; //Select all FlightDate where TourType = given parameter.
    const SELECT_DATE_TIME_QUERY = "SELECT Flight.FlightDate, Flight.Departure, Flight.TourType, Flight.FlightID, Flight.FlightPrice FROM " . FlightModel::TABLE . " WHERE SeatsAvailable>0"; 
    const INSERT_QUERY = "INSERT INTO " . FlightModel::TABLE . " (FlightID,RegID,FlightDate,Departure,TourType) VALUES (:FlightID,:RegID,:FlightDate,:Departure,:TourType)"; //Insert complete flight from parameter
    const DELETE_QUERY = "DELETE FROM" . FlightModel::TABLE . " WHERE FlightID= ?"; //Delete Flight where flightID equals given parameter
    

    private $selStmt;
    private $selDateStmt;
    private $selDateTimeStmt;
    private $selTimeWhrId;
    private $selPriceStmt;
    private $addStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(FlightModel::INSERT_QUERY);
        $this->selDateStmt = $this->dbConn->prepare(FlightModel::SELECT_DATE_QUERY);
        $this->selTimeWhrId = $this->dbConn->prepare(FlightModel::SELECT_TIME_WHERE_FLIGHTID_QUERY);
        $this->selDateTimeStmt = $this->dbConn->prepare(FlightModel::SELECT_DATE_TIME_QUERY);
        $this->selPriceStmt = $this->dbConn->prepare(FlightModel::SELECT_FLIGHTPRICE_WHERE_TOURTYPE);
        $this->selStmt = $this->dbConn->prepare(FlightModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(FlightModel::DELETE_QUERY);
    }

    /**
     * Get all aircraft stored in the DB
     * @return array in associative form
     */
    public function getAll() {
        // Fetch all Aircraft as associative arrays
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllDatesFor($TourType) {
        // Fetch all Aircraft as associative arrays
        $this->selDateStmt->execute(array($TourType));
        return $this->selDateStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllDatesAndTimes()
    {
        $this->selDateTimeStmt->execute();
        return $this->selDateTimeStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getTimeForFlightID($flightID)
    {
        $this->selTimeWhrId->execute(array($flightID));
        return $this->selTimeWhrId->fetchAll(PDO::FETCH_ASSOC);
    }
    
        public function getAllPrices($TourType) {
        // Fetch all Aircraft as associative arrays
        $this->selPriceStmt->execute(array($TourType));
        return $this->selPriceStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Try to add a new aircraft
     *
     * @param 
     *
     * @return bool true on success, false otherwise
     */
  //  public function add($givenFlightID,$givenRegIDFK,$givenFlightDate,$givenDeparture,$givenTourType) {
  //      return $this->addStmt->execute(array("FlightID" => $givenFlightID,"RegID" => $givenRegIDFK,"FlightDate" => $givenFlightDate,"Departure" => $givenDeparture, "TourType" => $givenTourType));
  //  }
    

}