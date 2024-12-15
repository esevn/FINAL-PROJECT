<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'final_project');

class Connection {
    public $db;
    public function __construct()
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(!$conn){
            die(" Gagal Terhubung ");
        }else {
            $this->db = $conn;
            return $this->db;
        }
    }
}
