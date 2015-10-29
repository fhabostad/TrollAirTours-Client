<?php

class BookingModel {
    
    private $dbConn;

    const TABLE = "Booking";
    const SELECT_QUERY = "SELECT * FROM " . BookingModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . BookingModel::TABLE . " (CustomerID,CustomRequest) VALUES (:CustomerID,:CustomRequest)";
    const DELETE_QUERY = "DELETE FROM" . BookingModel::TABLE; 
    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(BookingModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(BookingModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(BookingModel::DELETE_QUERY);
    }

    /**
     * Get all aircraft stored in the DB
     * @return array in associative form
     */
    public function getAll() {
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($customerID,$customerRequest){
    // $_SESSION["CustomerID"]
     $this->addStmt->execute(array("CustomerID" =>$customerID,"CustomRequest" => $customerRequest));
     $lastID = $this->dbConn->lastInsertId('Booking');
      return $lastID;
               
   }
    

}