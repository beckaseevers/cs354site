<?php
require_once "Student.php";
require_once "Dao.php";
require_once "UniClass.php";

$dao = new Dao();
$newClass;
$classes=array();

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
        fwrite(STDOUT,"What is the name of this class? ");
        $className=fgets(STDIN);
        $className=str_replace("\n","",$className);
        fwrite(STDOUT,"What is the class code? ");
        $classCode=fgets(STDIN);
        $classCode=str_replace("\n","",$classCode);
        fwrite(STDOUT,"Which semester will this class be held? ");
        $classSem=fgets(STDIN);
        $classSem=str_replace("\n","",$classSem);
        $newClass=new UniClass($className,$classCode,$classSem);

        fwrite(STDOUT, "\nClass created. Details below:\n\n");
        fwrite(STDOUT, $newClass->stringRep());
        
        fwrite(STDOUT, "\nDoes this all look right?[y/n] ");
        $confirmation=fgets(STDIN);
        $confirmation=str_replace("\n","",$confirmation);
        if($confirmation=="y") {
            //add class
            $classes[]=$newClass;
            fwrite(STDOUT, "Class created successfully\n\n");
            fwrite(STDOUT,"What would you like to do?\n");
            fwrite(STDOUT,"a.) Create a class\n");
            fwrite(STDOUT,"b.) Delete a class\n");
            fwrite(STDOUT,"c.) Enroll a student\n");
            fwrite(STDOUT,"d.) Drop a student\n");
        } else {
            fwrite(STDOUT, "Please try again\n\n");
            fwrite(STDOUT,"What would you like to do?\n");
            fwrite(STDOUT,"a.) Create a class\n");
            fwrite(STDOUT,"b.) Delete a class\n");
            fwrite(STDOUT,"c.) Enroll a student\n");
            fwrite(STDOUT,"d.) Drop a student\n");
        }
    } else if($val=="b\n") {
        fwrite(STDOUT,"Which class would you like to delete? (give course number)");
        foreach($classes as $class) {
            fwrite(STDOUT, $class->getTableRow());
        }
        $deleteID=fgets(STDIN);
        print_r($classes);
    } else if($val=="c\n") {
        fwrite(STDOUT,"Enroll a student\n");
    } else if($val=="d\n") {
        fwrite(STDOUT,"Drop a student\n");
    } else if($val!="exit\n"){
        $val=str_replace("\n","",$val);
        fwrite(STDOUT,"$val is an invalid option, try again\n");
    }
}