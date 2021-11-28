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

if(isset($_SESSION['shoppingcart'])){
    if(count($_SESSION['shoppingcart'][3]) > 0){
        $orders = $_SESSION['shoppingcart'][3];
    }
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

  <!-- Bootstrap Link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- Custom Css Stylesheet-->
  <link rel="stylesheet" href="./css/style.css">
  <title>Ecommerce Training Website</title>
</head>

<body>
  <!--Navbar -->
  <?php  

   include"./inc/header.php";
   
  ?>
  <!--End Navbar -->
    
  
  <!--Products Section-->
  
  <section class="products">
    <div class="row col-12 mx-3 my-5">
      
     <h1>Shopping Cart</h1>

     <table class="mx-5 my-5">
         <thead>
             <tr>
         <th scope="col">#</th>
         <th scope="col">Produit</th>
         <th scope="col">Quantite</th>
         <th scope="col">Total</th>
         <th scope="col">Action</th>
         </tr>
         </thead>
         <tbody>
             <?php 
               foreach($orders as $index => $order){                   
                
                   print '
                   <tr>
                   <th scope="row">'.($index+1).'</th>
                   <td class="mt-2">'.$order[0].'</td>
                   <td class="mt-2">'.$order[1].' pieces</td>
                   <td class="mt-2">'.$order[2].' DTT</td>
                   <td><button class="btn btn-danger mt-2">Supprimer</button></td>
                   </tr>
                   ';
                
               }
             ?>
         </tbody>
          

     </table> 

     <button type="button" class="btn btn-primary btn-lg" style="width: 150px; margin:0 auto;">Valider</button>
      

    </div>
    
  </section>
  
  <!--End Products Section-->
  <?php 
  
  include'./inc/footer.php';
  
  ?>
  <!-- Bootstrap Script-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
  </script>
</body>

</html>