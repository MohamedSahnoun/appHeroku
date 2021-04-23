<?php

include_once 'autoload.php';
include_once 'fragments/header.php';

class Repository
{
    protected $bd;
    private static $id=10;
    protected $tableName;
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->bd = ConnexionBD::getInstance();
    }

    public function findAll() {
        $request = "select * from ".$this->tableName;
        $response =$this->bd->prepare($request);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_OBJ);
    }


    public function deleteStudent($id){
        $request = "DELETE FROM ".$this->tableName." WHERE id='".$id."'";
        $response =$this->bd->prepare($request);
        $response->execute();
        $this->updateHistory($_SESSION['user'],"delete student","delete the student number ".$id);
        return $response->fetchAll(PDO::FETCH_OBJ);

    }

    public function verifBase($a,$b)
    {
       /* $request_type = "SELECT * FROM ".$this->tableName;*/
        echo "iam in the verification";
        $request = "SELECT * FROM ".$this->tableName." where username= '".$a."' and password='".$b."'";
        $response =$this->bd->prepare($request);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_OBJ);;


    }
    public function updateHistory($num,$firstname,$age){
        $request_history = "INSERT INTO history (ByWho,Date,Type,modification) VALUES ('" . $num. "',NOW(),'" . $firstname . "','" . $age . "')";
        $response =$this->bd->prepare($request_history);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
    public function addStudent($num,$firstname,$lastname,$age,$profession,$image){
        $request = "INSERT INTO ".$this->tableName." (ID,Firstname,Lastname,Age,Profession,Image) VALUES ('" . $num . "','" . $firstname . "','" . $lastname . "','" . $age . "','" . $profession . "','" . $image . "')";
        $this->updateHistory($_SESSION['user'],"adding student","added the student number ".$num);
        $response =$this->bd->prepare($request);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
    public function updateStudent($num,$firstname,$lastname,$age,$profession,$image){
        $request = "UPDATE ".$this->tableName." SET Firstname= '" . $firstname . "',Lastname= '" . $lastname . "',Age= '" . $age . "',Profession= '" . $profession . "',Image= '" . $image . "' where ID = '" . $num . "'";
        $response =$this->bd->prepare($request);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($id) {
        $request = "select * from ".$this->tableName ." where id = '" . $id . "'";
        $this->updateHistory($_SESSION['user'],"find student","find the student number ".$id);
        $response =$this->bd->prepare($request);
        $response->execute();
        return $response->fetch(PDO::FETCH_OBJ);
    }
}