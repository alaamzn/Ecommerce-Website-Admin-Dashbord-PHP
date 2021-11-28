<?php 

session_start();

include '../../inc/functions.php';

$products = loadProducts();
$categories = loadCategories();


?>



<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>Admin Dashbord</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/dashboard.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Mezni Store</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link btn btn-primary" href="../../logout.php">Logout</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <?php 

       include "../template/navigation.php";

      ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Products list</h1>
          <p>
            
            <?php 

            //echo json_encode($products);

            ?>
          </p>


          <div>
            <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
          </div>



        </div>
        <div>
 
          <?php  
          

          
          
          if(isset($_GET['ajout']) && $_GET['ajout'] == 'ok'){
              print '<div class="alert alert-success">Produit added successfully</div>';                
           } 

           if(isset($_GET['update']) && $_GET['update'] == 'ok'){
            print '<div class="alert alert-success">Produit updated successfully</div>';                
            }

          if(isset($_GET['delete']) && $_GET['delete'] == 'ok'){
          print '<div class="alert alert-success">Produit deleted successfully</div>';                
          }

          if(isset($_GET['erreur']) && $_GET['erreur'] == 'duplicate'){
            print '<div class="alert alert-danger">Produit name already exists</div>';                
            }

        ?>
       
            
           




        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Description</th>
              <th scope="col">Prix</th>
              <th scope="col">Image</th>
              <th scope="col">Createur</th>
              <th scope="col">Categorie</th>
              <th scope="col">Date de creation</th>
            </tr>
          </thead>
          <tbody>


            <?php 
           



            $i=0;
            foreach($products as $product){
          $i++;
              print'
              <tr>

              <th scope="row">'.$i.'</th>
              <td>'. $product["nom"] .'</td>
              <td>'. $product["description"] .'</td>
              <td>'. $product["prix"] .'</td>
              <td>'. $product["image"] .'</td>
              <td>'. $product["createur"] .'</td>
              <td>'. $product["categorie"] .'</td>
              <td>'. $product["date_creation"] .'</td>
              <td>
              <a data-toggle="modal" data-target="#editModal'.$product['id'].'" class="btn btn-success">Modifier</a>
              <a onClick="return popUpDeleteProduct()" href="delete_product.php?idp='.$product['id'].'" class="btn btn-danger">Supprimer</a>
              </td>
              </tr>';
          }






           ?>

          </tbody>
        </table>

        <!-- Button trigger modal -->

    </div>



    </main>
  </div>
  </div>
















  <!-- Modal Ajout-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un produit</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
        <div class="modal-body">

          <form action="add_product.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="">Nom</label>
              <input type="text" name="nom" class="form-control" placeholder="Nom du produit">
            </div>
            <br>
            <div class="form-group">
              <label for="">Description</label>
              <input type="text" name="description" id="nom" class="form-control" placeholder="Description du produit">
            </div>
            <div class="form-group">
              <label for="">Prix</label>
              <input type="number" step="0.1" name="prix" id="prix" class="form-control" placeholder="Prix du produit">
            </div>
            <div class="form-group">
              <label for="">Image</label>
              <input type="file" name="image" id="image" class="form-control" placeholder="Image du produit">
            </div>



            <div class="form-group">
              
              <select name="categorie" class="form-control">
                  <?php
                    foreach($categories as $index => $c)

                        print '<option value="'.$c['id'].'">'.$c['nom'].'</option>';
                    
                    
                  ?>
              </select>
            </div>

            <div class="form-group">
              <input type="number" name="quantite" class="form-control" placeholder="Type the quantity">
            </div> 

            <div class="form-group">
             
              <input type="hidden" name="createur" value="<?php echo $_SESSION['id'];?>">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
        </form>
      </div>
    </div>
  </div>






















  <?php

foreach($products as $index => $product){?>

  <!-- Modal Edit-->
  <div class="modal fade" id="editModal<?php echo $product['id'];?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Update a product</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="update_product.php" method="post" enctype="multipart/form-data">


            <input type="hidden" value="<?php echo $product['id'];?>" name="idp">

            <div class="form-group">
              <label for="">Nom</label>
              <input name="nom" class="form-control" value="<?php echo $product['nom'];?>">
            </div>

            <br>

            <div class="form-group">
              <label for="">Description</label>
              <textarea name="description" class="form-control"><?php echo $product['description'];?></textarea>
            </div>
           
            <div class="form-group">
              <label for="">Prix</label>
              <input type="number" name="prix" class="form-control" value="<?php echo $product['prix']; ?>"/>
            </div>

           

            <div class="form-group">
              <label for="img">Image</label>
              <input type="file" name="image" class="form-control" value="" id="img" title=" "/>
            </div>

            <div class="form-group">
              
              <select name="categorie" class="form-control">
                  <?php
                    foreach($categories as $index => $c)

                        print '<option value='.$c["id"].'>'.$c["nom"].'</option>';
                    
                    
                  ?>
              </select>
            </div>

            <div class="form-group">
              
              <input type="hidden" name="createur" value="<?php echo $_SESSION['id'];?>">
              
            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <?php

   }

  ?>










  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>


    <!--Custom script-->
    <script>
    // Product deletion Pop up function
    function popUpDeleteProduct(){
      return confirm("Do you really want to delete this product?");
    }
    </script>
  <!-- Graphs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

  



















</body>

</html>