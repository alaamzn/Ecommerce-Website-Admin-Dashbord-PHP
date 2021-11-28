<?php
session_start();
//1 - Retrieve Form data 

$nom = $_POST['nom'];
$desc = $_POST['description'];
$createur = $_SESSION['id'];
$date_creation = date("Y-m-d"); //"2021-05-05"


// echo $nom;
// echo $desc;

//2 - Connect to the database
include '../../inc/functions.php';
$conn = DatabaseConnection();



try{
   //3 - Request Statement
$request = "INSERT INTO categorie(nom, description, createur, date_creation) VALUES ('$nom', '$desc','$createur', '$date_creation')";

//4 - Request Execution
$result = $conn->query($request);

if($result){
    //Redirection to list.php
    header('location:categories_list.php?ajout=ok');
}
}catch(PDOException $e){
   //echo 'Connection failed'. $e->getMessage();
   
    //echo 'Category name already exists !!';
    if($e->getCode() == 23000){
    header('location:categories_list.php?erreur=duplicate');
    }
}

?>