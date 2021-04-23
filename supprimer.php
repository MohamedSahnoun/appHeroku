<?php
$arr = array_flip($_POST);
include_once 'autoload.php';
$studentRepository = new StudentRepository();
$studentRepository->deleteStudent($arr['Delete']);
header("location:personnesList.php");

