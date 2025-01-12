<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "shop_management";
    public $conn;

    public function __construct() {
        // Establish the connection
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Function to execute a query (INSERT, UPDATE, DELETE)
    public function executeQuery($query) {
        return $this->conn->query($query);
    }

    // Function to fetch results from SELECT queries
    public function fetchQuery($query) {
        $result = $this->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Close the connection
    public function close() {
        $this->conn->close();
    }
}
?>
