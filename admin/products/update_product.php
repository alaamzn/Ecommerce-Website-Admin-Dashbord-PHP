<?php

session_start();

//1 - Retrieve Form data 
$id = $_POST['idp'];
$nom = $_POST['nom'];
$desc = $_POST['description'];
$prix = $_POST['prix'];
$c = $_POST['categorie'];
$date = date("Y-m-d");

// Uploading the product image
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);




if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
    //echo "The file " .htmlspecialchars( basename($_FILES["image"]["name"]))." has been uploaded";
    $image = $_FILES["image"]["name"];
}else{
    echo "Sorry, there was an error uploading your file"; 
}

//$date_modification = date("Y-m-d"); //"2021-05-05"

// echo $nom;
// echo $desc;

//2 - Connect to the database
include '../../inc/functions.php';
$conn = DatabaseConnection();

try{
// //3 - Request Statement
$request = "UPDATE produit SET nom='$nom', description='$desc', prix='$prix', image='$image', categorie='$c', date_modification='$date' WHERE id='$id'";

//4 - Request Execution
$result = $conn->query($request);

if($result){
     header('location:products_list.php?update=ok');
 }

}catch(PDOException $e){
    echo $e -> getMessage();
}


?>