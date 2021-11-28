<?php

session_start();

//1 - Retrieve Form data 
$id = $_POST['idc'];
$nom = $_POST['nom'];
$desc = $_POST['description'];
$date_modification = date("Y-m-d");

//$date_modification = date("Y-m-d"); //"2021-05-05"

// echo $nom;
// echo $desc;

//2 - Connect to the database
include '../../inc/functions.php';
$conn = DatabaseConnection();

// //3 - Request Statement
$request = "UPDATE categorie SET nom='$nom',description='$desc',date_modification='$date_modification' WHERE id='$id' ";

//4 - Request Execution
$result = $conn->query($request);

if($result){
     header('location:categories_list.php?update=ok');
 }


?>