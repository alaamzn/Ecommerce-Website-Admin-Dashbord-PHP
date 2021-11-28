<?php 

session_start();


$nom = $_POST['nom'];
$desc = $_POST['description'];
$prix = $_POST['prix'];
$c = $_POST['categorie'];


$createur = $_POST['createur'];
$quantite = $_POST['quantite'];
//$date_creation = date('Y-m-d');
//var_dump($_POST);

// Uploading the product image
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);




if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
    //echo "The file " .htmlspecialchars( basename($_FILES["image"]["name"]))." has been uploaded";
    $image = $_FILES["image"]["name"];
}else{
    echo "Sorry, there was an error uploading your file"; 
}


$date = date('Y-m-d');
//print ' This is the date of creation' .$date;

// 1. Connect to the Database
include "../../inc/functions.php";
$conn = DatabaseConnection();

//print 'This is the category name' .$c;

try{
//2 - Request Statement
$request = "INSERT INTO produit(nom,description,prix, image,createur,categorie,date_creation) VALUES ('$nom','$desc', '$prix','$image','$createur', '$c','$date')";


//3 - Request Execution
$result = $conn->query($request);




if($result){

    $product_id = $conn -> lastInsertId();

    $request2 = "INSERT INTO stocks(produit, quantite, createur, date_creation)VALUES('$product_id', '$quantite', '$createur', '$date')";


    if($conn -> query($request2)){
        header('location:products_list.php?ajout=ok');
    }else{
        echo "Impossible d'ajouter le stock du produit";
    }

   
}

}catch(PDOException $e){
    print $e->getMessage();
    if($e->getCode() == 23000){
        header('location:list.php?duplicate=ok');
    }
}
//echo exec("whoami");













?>