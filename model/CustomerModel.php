<?php

class CustomerModel {
    /** @var PDO */
    private $dbConn;

    const TABLE = "customer";
    const SELECT_QUERY = "SELECT * FROM " . CustomerModel::TABLE;
    const INSERT_QUERY = " INSERT INTO " . CustomerModel::TABLE . " ( Gender, FirstName, LastName, AreaCode, TelephoneNumber, StreetAddress, City, ZipCode, Email, Country, BirthDate) VALUES ( :Gender,:FirstName,:LastName,:AreaCode,:TelephoneNumber,:StreetAddress,:City,:ZipCode,:Email,:Country, :BirthDate)";
    const INSERT_CUSTOM_QUERY = " INSERT INTO " . CustomerModel::TABLE . " (FirstName, LastName, Email, TelephoneNumber) VALUES (:FirstName,:LastName,:Email,:TelephoneNumber)";
  
    // const INSERT_QUERY = " INSERT INTO " . CustomerModel::TABLE . "(Gender,
   //     FirstName, LastName, TelephoneNumber, StreetAddress, ZipCode, Email, Country
     //   )VALUES( :Gender, :First_name, :Last_name, :Phone_number, :Address, :Zip_code, :Email, : Country)";

    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;
    private $addCustStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(CustomerModel::INSERT_QUERY);
        $this->addCustStmt = $this->dbConn->prepare(CustomerModel::INSERT_CUSTOM_QUERY);
        $this->selStmt = $this->dbConn->prepare(CustomerModel::SELECT_QUERY);
    }

    /**
     * Get all customers stored in the DB
     * @return array in associative form
     */
    public function getAll() {
        // Fetch all customers as associative arrays
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Try to add a new customer
     *
     * @param $name
     *
     * @return bool true on success, false otherwise
     */
    public function add($givenGender, $givenFirst_name, $givenLast_name, $givenStreet_address, $givenCountry_code, $givenPhone_number, $givenCity, $givenZip_code, $givenEmail, $givenCountry, $givenBirth_date) {
      $this->addStmt->execute(array("Gender" =>$givenGender, "FirstName" => $givenFirst_name, "LastName" => $givenLast_name, "AreaCode" => $givenCountry_code, "TelephoneNumber" => $givenPhone_number, "StreetAddress" => $givenStreet_address, "City" => $givenCity, "ZipCode" => $givenZip_code, "Email" => $givenEmail, "Country" => $givenCountry, "BirthDate" => $givenBirth_date));
      $lastID = $this->dbConn->lastInsertId('customer');
      return $lastID;
    }

    public function addCustom($givenCompany, $name, $givenEmail, $givenPhone_number) {
        $this->addCustStmt->execute(array("FirstName" => $givenCompany, "LastName" => $name, "Email" => $givenEmail, "TelephoneNumber" => $givenPhone_number));
      $lastID = $this->dbConn->lastInsertId('customer');
      
      return $lastID;
    }
              
          //      $_SESSION["givenBirth_date"]     = "";    
                  
    // TODO - create additional functions for customer model here

}