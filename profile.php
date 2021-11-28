<?php 
session_start();

include'./inc/functions.php';

$categories = loadCategories();

if(!isset($_SESSION['nom']))

   header('location:login.php')

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <!-- Custom Css Stylesheet-->
    <link rel="stylesheet" href="./css/style.css">
    

    <title>Profile</title>
</head>
<body>
    
    <?php 
      include './inc/header.php';
    ?>
    <div class="container">
    <h1>Welcome to your Profile Page  <?php echo $_SESSION['nom'].' '.$_SESSION['prenom']. ' and your phone number is :' .$_SESSION['telephone']. ' and your password is : ' .$_SESSION['mp']?></h1>
    
    
    </div>

    <?php 
  
  include './inc/footer.php';
  
  ?>
    <!-- Bootstrap Script-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>