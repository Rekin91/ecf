<?php
session_start();
if($_SESSION["utilavis"] == 1){

    $_SESSION["message"] = "un avis a déja été envoyer aujourd'hui merci de ressayer plus tard";
    header('location: ../contact.php');
    exit;


}


if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

    $_SESSION["utilavis"] = 1;

$to = "recipient@example.com";
$subject = htmlspecialchars($_POST["titre"]);
$message = htmlspecialchars($_POST["message"]);
$headers = "From: ".$_POST["email"]."\r\n";
$headers .= "Return-Path: ".$_POST["email"]."\r\n"; 


if (mail($to, $subject, $message, $headers)) {
    $_SESSION['message'] = "L'e-mail a été envoyé avec succès.";
    header("location: ../contact.php");
    exit;
} else {
    $_SESSION['message'] = "L'e-mail n'a pas été envoyer, merci de réesayer";
    header("location: ../contact.php");
    exit;


}
}