<?php

class Crud{
    protected $conn;
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ict_job_db";

        $this->conn = new mysqli($servername, $username, $password, $dbname);
    }

    public function getUserById($id){
        $query = "SELECT * FROM job_seekers WHERE JobSeekerId='$id'";
        if (mysqli_query($this->conn, $query)) {
            $queryRes = mysqli_query($this->conn, $query);
            $user = mysqli_fetch_assoc($queryRes);
            return $user;
        } else {
            die("Query Problem: " . mysqli_errno($this->conn));
        }
    }

    public function editProfile(){
        //return "<h1>Edited Successfully.</h1>";
    }
}