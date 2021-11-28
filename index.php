<?php
session_start();

include './inc/functions.php';

$categories = loadCategories();


if(!empty($_POST)){ //Search button clicked
     //echo "Search button clicked";

     $products = searchProducts($_POST['search']);
 
}else{

  $products = loadProducts();

}

//var_dump($categories);
//var_dump($products);

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--Bootstrap Link-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

 


  <!-- Custom Css Stylesheet-->
  <link rel="stylesheet" href="./css/style.css">
  <title>Ecommerce Training Website</title>
</head>

<body>

  <!--Navbar -->
  <?php  

   include "./inc/header.php";   

  ?>
  <!--End Navbar -->


  
    <div class="row col-12 mx-5 my-5">

     <h1>Featured </h1>
     
      <?php 
      

      // Making a copy of the products array before popping elements from it
      $featured = $products; 
         
      $lastFive = array();

      for($i=0; $i < 4; $i++) {
          $obj = array_pop($featured);
      
          if ($obj == null) break;
          $lastFive[] = $obj;
      }
      
         
         foreach($lastFive as $f){
         
           
           print '<div class="card col-3 mx-1 my-2" style="width: 22%; height: 20%;">
           <img src="images/'.$f['image'].'" class="card-img-top" alt="...">
           <div class="card-body">
             <h5 class="card-title">'.$f["nom"].'</h5>
             <p class="card-text">'.$f["description"].'</p>
             <a href="product.php?id='.$f["id"].'" class="btn btn-primary">Show</a>
           </div>
         </div>';
         }
         


      ?>

    </div>
    
  
  <!--Products Section-->
  
  <section class="products">
    <div class="row col-12 mx-3 my-3">
      
     <h1>All products</h1>
     
      <?php 
         foreach($products as $product){
           print '<div class="card col-3 mx-1 my-1" style="width: 22%; height: 20%;">
           <img src="./images/'.$product['image'].'" class="card-img-top" alt="...">
           <div class="card-body">
             <h5 class="card-title">'.$product["nom"].'</h5>
             <p class="card-text">'.$product["description"].'</p>
             <a href="product.php?id='.$product["id"].'" class="btn btn-primary">Show</a>
           </div>
         </div>';
         }
      ?>

    </div>
    
  </section>
  
  <!--End Products Section-->
  <?php 
  
    include './inc/footer.php';
  
  ?>
  <!-- Bootstrap Script-->
  <script href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">

   
  </script>

  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/Chart.min.js"></script>
  <script src="./js/feather.min.js"></script>
  <script src="./js/jquery-3.3.1.slim.min.js"></script> 
  <script src="./js/popper.min.js"></script>
  
  
   
</body>

</html>