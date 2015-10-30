<?php

class ProductModel {
    
    private $dbConn;

    const TABLE = "Product";
    const SELECT_QUERY = "SELECT * FROM " . ProductModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . ProductModel::TABLE . " (ProductID, ProductType, ProductName, ProductDescription, ProductPrice) VALUES (:ProductID,:ProductType,:ProductName,:ProductDescription, :ProductPrice)";
    const SELECT_WHERE_QUERY = "SELECT * FROM " . ProductModel::TABLE . " WHERE ProductType = ?";
    const SELECT_WHERE_ID_QUERY = "SELECT * FROM " . ProductModel::TABLE . " WHERE ProductID = ?";
   // const SELECT_WHERE_PRICE_QUERY = "SELECT * FROM " . ProductModel::TABLE . " WHERE ProductPrice = ?";
    const SELECT_PRICE_WHERE_ID_QUERY = "SELECT ProductPrice FROM " . ProductModel::TABLE . " WHERE ProductID = ?"; 
    
    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;
    private $selWhereStmt;
    private $selWhereIDStmt;
    private $selWherePriceStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(ProductModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(ProductModel::SELECT_QUERY);
        $this->selWhereStmt = $this->dbConn->prepare(ProductModel::SELECT_WHERE_QUERY);
        $this->selWhereIDStmt = $this->dbConn->prepare(ProductModel::SELECT_WHERE_ID_QUERY);
        $this->selPriceWhereStmt = $this->dbConn->prepare(ProductModel::SELECT_PRICE_WHERE_ID_QUERY);
    }
    
    public function getAllWhereProductID($productID) {
        // Fetch all products as associative arrays
        $this->selWhereIDStmt->execute(array($productID));
        return $this->selWhereIDStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPriceWhereProductID($productID) {
        // Fetch all products as associative arrays
        $this->selPriceWhereStmt->execute(array($productID));
        return $this->selPriceWhereStmt->fetchAll(PDO::FETCH_ASSOC);
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
   
        
    public function getAllWhereProductType($productType) {
        // Fetch all products as associative arrays
        $this->selWhereStmt->execute($productType);
        return $this->selWhereStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
 
}