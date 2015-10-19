<?php

class ProductModel {
    
    private $dbConn;

    const TABLE = "Product";
    const SELECT_QUERY = "SELECT * FROM " . ProductModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . ProductModel::TABLE . " (ProductID, ProductType, ProductName, ProductDescription) VALUES (:ProductID,:ProductType,:ProductName,:ProductDescription)";

    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(ProductModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(ProductModel::SELECT_QUERY);
    }

    /**
     * Get all aircraft stored in the DB
     * @return array in associative form
     */
    public function getAll() {
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Try to add a new aircraft
}
     * @param 
     * @return bool true on success, false otherwise
     */
    public function add($givenProductName) {
        return $this->addStmt->execute(array("ProductName" => $givenProductName));
    }
}