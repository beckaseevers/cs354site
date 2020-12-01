<?php
require_once "Student.php";

fwrite(STDOUT, 'What is your first name?');
$first=fgets(STDIN);
$first=str_replace("\n",'',$first);
fwrite(STDOUT, 'What is your last name?');
$last=fgets(STDIN);
$last=str_replace("\n",'',$last);
$student = new Student($first, $last);
$check = fgets(STDIN);

fwrite(STDOUT, $check);