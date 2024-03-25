<?php
if(!defined('DB_SERVER')){
    require_once("../initialize.php");
}

// define('DB_SERVER', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'myhmsdb');
// $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// // Check connection
// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }

class DBConnection{

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'myhmsdb';
    
    public $conn;
    
    public function __construct(){

        if (!isset($this->conn)) {
            
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->conn) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
    }
    public function __destruct(){
        $this->conn->close();
    }
}
?>