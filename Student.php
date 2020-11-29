<?php
include_once "Dao.php";
$dao = new Dao();

class Student {

    public $username;
    public $studentID;
    public $email;
    public $firstname;
    public $lastname;
    
    public function __construct($firstname, $lastname) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $tmpname = $firstname . $lastname;
        $this->username = newUsername($tmpname);
        $this->studentID = newID();
        $this->email = newEmail($username);
    }

    public function newUsername($tmpname) {
        // check if username is already taken, if so increment end digits
        $dup = $dao->userExists($tmpname);
        if (isset($dup) && !empty($dup)){
            if(preg_match_all('!\d+!', $tmpname, $matches)) {
                $endDig = $matches[0][0];
                $endDig++;
                $tmpname = preg_replace('!\d+!', $endDig, $tmpname); // replaces digits at end w/ ++digit
            } else {
                $tmpname .= 1;
            }
            newUsername($tmpname);
        }
        return $tmpname;
    }

    public function newID() {
        $stuID = '';
        while (strlen((string)$stuID) < 10) {
            $stuID .= rand(0, 9);
        }
        // check if stuID already exists, if so, do it again
        $dup = $dao->dupeStuID($stuID);
        if (isset($dup) && !empty($dup)) {
            newID();
        }
        return $stuID;
    }

    public function newEmail($user) {
        return $user . "@phpschool.edu";
    }
    
}