<?php
include "model/config.php";

/**
 * Manage DB Connection

 */
class Connection {

    private $str;

    /**
     * Connection Constructor
     */
    function __construct() {
        $this->str = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    }

    /**
     * Opening DB Connection
     * @return \PDO open connection
     */
    public function open() {
        try {
            return new PDO($this->str, DB_USER, DB_PASSWORD);
        } catch (PDOException $ex) {
            error_log("ERROR: " . __FILE__ . " LINE " . __LINE__ . "  ERROR " . $ex->getMessage());
            return NULL;
        }
    }
}
