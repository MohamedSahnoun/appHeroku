<?php
session_start();
include_once 'autoload.php';
header("location:personnesList.php");
$user = new UserRepository();

/*
 * 1- Récupérer les identifiants
 * Tester si le login et le mot de passe correspondent
 * Si oui
 *  Redirige vers la page d'accueil
 * Si non
 *  Redirgie vers la page login avec un message d'erreur
 * */

//1
$username = $_POST['email'];
$password = $_POST['pwd'];

if (isset($username)&&isset($password)) {
    if($user->verifBase($username,$password)){
        $_SESSION['user']=''.$username;
        header("location:personnesList.php");
    }
} else {
    $_SESSION['errorMessage']="Veuillez vérifier vos credenitals";
    header('location:index.php');
}