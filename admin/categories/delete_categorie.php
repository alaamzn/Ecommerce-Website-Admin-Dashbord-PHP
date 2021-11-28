<?php
session_start();
//1 - Retrieve Form data 

// $nom = $_POST['nom'];
// $desc = $_POST['description'];
$idcat = $_GET['idc'];

echo "L'identifiant de la catégorie est : ". $idcat;



// echo $nom;
// echo $desc;

//2 - Connect to the database
include '../../inc/functions.php';
$conn = DatabaseConnection();

// //3 - Request Statement
$request = "DELETE FROM categorie WHERE id=$idcat";

// //4 - Request Execution
$result = $conn->query($request);

if($result){
    header('location:categories_list.php?delete=ok');
}


?>