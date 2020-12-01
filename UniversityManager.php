<?php
require_once "Student.php";
require_once "Dao.php";

$dao = new Dao();

$val='';
fwrite(STDOUT,"What would you like to do?\n");
fwrite(STDOUT,"a.) Create a class\n");
fwrite(STDOUT,"b.) Delete a class\n");
fwrite(STDOUT,"c.) Enroll a student\n");
fwrite(STDOUT,"d.) Drop a student\n");
    
while($val!="exit\n") {

    fwrite(STDOUT, "\$ ");
    $val=fgets(STDIN);
    if($val=="a\n") {
        fwrite(STDOUT,"Create a class\n");
    } else if($val=="b\n") {
        fwrite(STDOUT,"Delete a class\n");
    } else if($val=="c\n") {
        fwrite(STDOUT,"Enroll a student\n");
    } else if($val=="d\n") {
        fwrite(STDOUT,"Drop a student\n");
    } else if($val!="exit\n"){
        $val=str_replace("\n","",$val);
        fwrite(STDOUT,"$val is an invalid option, try again\n");
    }
}