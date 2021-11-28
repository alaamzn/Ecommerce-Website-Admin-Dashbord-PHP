<?php 

// 1. Retrieve the customer id 
$idCustomer = $_GET['id'];


include "../../inc/functions.php";

// 2. Connect to the Database
$conn = DatabaseConnection();

// 3. Request Creation
$request = "UPDATE visiteur SET etat=1 WHERE id='$idCustomer'";

// 4. Request Execution
$result = $conn -> query($request);

if($result){
    header('location:customers_list.php?stateupdated=ok');
}




?>