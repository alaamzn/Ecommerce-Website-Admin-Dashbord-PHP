<?php



$quantite = $_POST['quantite'];
$stock_id = $_POST['ids'];

include "../../inc/functions.php";

// 1. Database connection
$conn = DatabaseConnection();

$request = "UPDATE stocks SET quantite='$quantite' WHERE id='$stock_id'";

$result = $conn -> query($request);

if($result){
    header('location:stocks_list.php?stockupdated=ok');
}



?>