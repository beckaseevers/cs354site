<?php
require_once 'Student.php';

class Dao {
    private $host = "us-cdbr-east-02.cleardb.com";
    private $db = "heroku_7467d4db5f1e822";
    private $user = "b1efda53ad3950";
    private $pass = "ca9ce9f7";

    public function getConnection () {
        try {
          $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
          return $conn;
        } catch (Exception $e) {
          echo print_r($e,1);
          exit;
        }
    }

    public function addStudent($student){
        $conn = $this->getConnection();
        // random student number generator here or in newstudent
        // random email gen
    }

    public function getClasses($studentID){
        $conn = $this->getConnection();
        $retval = $conn->query("SELECT class, class_code, semester FROM classes WHERE studentID='{$studentID}'", PDO::FETCH_ASSOC);
    }

    public function dupeStuID($studentID) {
        $conn = $this->getConnection();
        $retval = $conn->query("SELECT * FROM students WHERE studentID='{$studentID}'", PDO::FETCH_ASSOC);
        return $retval;
    }

    public function userExists($username) {
        $conn = $this->getConnection();
        $retval = $conn->query("SELECT * FROM students WHERE username='{$username}'", PDO::FETCH_ASSOC);
        return $retval;
    }
    
}