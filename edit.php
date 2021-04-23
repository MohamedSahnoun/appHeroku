<?php
include_once 'autoload.php';
$studentRepository = new StudentRepository();
$num = (int)$_POST['id'];
var_dump($_FILES);
$image = $_FILES['image']['tmp_name'];
$name = $_FILES['image']['name'];
$image = base64_encode(file_get_contents(addslashes($image)));
if(isset($_POST['id'])){
    $infos=$studentRepository->findById($num);
    if(!$infos){
        $studentRepository->addStudent($num,$_POST['firstname'],$_POST['lastname'],(int)$_POST['age'],$_POST['profession'],$image);

    }else{
        $studentRepository->updateStudent($num,$_POST['firstname'],$_POST['lastname'],(int)$_POST['age'],$_POST['profession'],$image);
    }

    header("location:personnesList.php");
}