<?php

session_start();

// if(!isset($_SESSION['nom'])){
//     header('location:../login.php');
//     exit();
// }

 $product_id = $_POST['produit'];

 $quantite = $_POST['quantite'];


 include '../inc/functions.php';
 $conn = DatabaseConnection();

 $connectedUser = $_SESSION['id'];

 // DB request to retrieve product price based on id 
 $request = "SELECT prix, nom from produit WHERE id='$product_id'";

 $result = $conn -> query($request);

 $product = $result ->fetch();

 $total = $product['prix'] * $quantite;

// //echo $total;

 $date = date("Y-m-d");
  
 if(!isset($_SESSION['shoppingcart'])){// If the shopping cart does not exist 
    //Create the shopping cart
    $_SESSION['shoppingcart'] = array($connectedUser, 0, $date, array());
 }
  
 $_SESSION['shoppingcart'][1] += $total;
 $_SESSION["shoppingcart"][3][] = array($product['nom'] ,$quantite, $total, $date, $date);


 

 





// // Add a new row to the shopping cart table


// try{
//     $shoppingCartRequest = "INSERT INTO panier(visiteur, total, date_creation) VALUES('$connectedUser', '$total', '$date')";

//     $result3 = $conn -> query($shoppingCartRequest);

//     $shopping_cart_id = $conn -> lastInsertId();
//     //var_dump($shopping_cart_id);

//     //Insert new row in the orders table
//      $request2 = "INSERT INTO commande(produit, quantite, panier, total, date_creation) VALUES('$product_id', '$quantite', '$shopping_cart_id', '$total', '$date')";

//      $result2 = $conn -> query($request2);

//     if($result2 && $result3){
//     // echo 'Row added successfully to Order and Shopping Cart';
//     //header('location:product.php?order=ok');
// }
// }catch(PDOException $e){
//     //echo $e -> getMessage();
// }

header('location:../shoppingcart.php');







?>