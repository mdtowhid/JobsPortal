<?php
class DB{
    protected $conn;
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ict_job_db";

        $this->conn = new mysqli($servername, $username, $password, $dbname);
        
    }
}