<?php
session_start();
//1 - Retrieve Form data 

// $nom = $_POST['nom'];
// $desc = $_POST['description'];
$idp = $_GET['idp'];

echo "L'identifiant de la catégorie est : ". $idcat;



// echo $nom;
// echo $desc;

//2 - Connect to the database
include '../../inc/functions.php';
$conn = DatabaseConnection();

// //3 - Request Statement
$request = "DELETE FROM produit WHERE id=$idp";

// //4 - Request Execution
$result = $conn->query($request);

if($result){
    header('location:products_list.php?delete=ok');
}


?>