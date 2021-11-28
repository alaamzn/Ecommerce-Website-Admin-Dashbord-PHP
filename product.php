<?php

session_start();

include'inc/functions.php';

$categories = loadCategories();

if(isset($_GET['id'])){
    $product = getProductById($_GET['id']);
}


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

   include"inc/header.php";
   
  ?>
    <!--End Navbar -->
    <!--Products Section-->

    <section class="products">
        <div class="row col-12 mt-4">

            <div class="card col-6 offset-3">
                <img src="./images/<?php 
                      echo $product['image'];
                    ?>" class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title">
                    <?php  echo $product['nom']; ?>
                    </h5>

                    <p class="card-text">
                    <?php echo $product['description']; ?>
                    </p>
                </div>
                
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $product['prix'];?> DT</li>
                    <?php 

                     foreach($categories as $index => $c){
                         if($c['id'] == $product['categorie']){
print '<button class="btn btn-success">'.$c['nom'].'</button>';              
                         }
                     }
                     
                    ?>
                       
                </ul>
                <div class="my-2 text-center">

                <form action="./actions/order.php" method="POST">
                    <input type="hidden" value="<?php echo $product['id']; ?>" name="produit"/>
                    <input type="number" name="quantite" step="1" class="form-control" placeholder="Quantity"/>
                    <button type="submit" class="btn btn-primary mt-2">Order</button>  
                </form>
                </div>
               
            </div>

            

        </div>
    </section>

    <!--End Products Section-->
    <?php 
  
  include './inc/footer.php';
  
  ?>

    <!--End Footer Section-->
    <!-- Bootstrap Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>