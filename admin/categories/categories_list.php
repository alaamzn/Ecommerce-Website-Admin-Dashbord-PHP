<?php 

session_start();

include '../../inc/functions.php';

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
          <h1 class="h2">Categories list</h1>
          

          <?php 

           echo $_SESSION['id'];

          ?>


          <div>
            <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
          </div>



        </div>
        <div>
 
          <?php  
          
            if(isset($_GET['ajout']) && $_GET['ajout'] == 'ok'){
                print '<div class="alert alert-success">Categorie added successfully</div>';                
             } 

             if(isset($_GET['update']) && $_GET['update'] == 'ok'){
              print '<div class="alert alert-success">Categorie updated successfully</div>';                
              }

            if(isset($_GET['delete']) && $_GET['delete'] == 'ok'){
            print '<div class="alert alert-success">Categorie deleted successfully</div>';                
            }

            if(isset($_GET['erreur']) && $_GET['erreur'] == 'duplicate'){
              print '<div class="alert alert-danger">Category name already exists</div>';                
              }

          ?>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>


            <?php 
            $i=0;
            foreach($categories as $categorie){
          $i++;
              print'
              <tr>

              <th scope="row">'.$i.'</th>
              <td>'. $categorie["nom"] .'</td>
              <td>'. $categorie["description"] .'</td>
              <td>
              <a data-toggle="modal" data-target="#editModal'.$categorie['id'].'" class="btn btn-success">Modifier</a>
              <a onClick="return popUpDeleteCategorie()" href="delete_categorie.php?idc='.$categorie['id'].'" class="btn btn-danger">Supprimer</a>
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
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une categorie</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
        <div class="modal-body">

          <form action="./add_categorie.php" method="post" id="addform">

            <div class="form-group" id="blocknom">
              <label for="">Nom</label>
              <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom du categorie">
            </div>

            <br>

            <div class="form-group">
              <label for="">Description</label>
              <textarea name="description" class="form-control" placeholder="Description de la categorie"></textarea>
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
   foreach($categories as $index => $categorie){?>

  <!-- Modal Edit-->
  <div class="modal fade" id="editModal<?php echo $categorie['id'];?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Modifier une categorie</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="./update_categorie.php" method="post">


            <input type="hidden" value="<?php echo $categorie['id'];?>" name="idc">

            <div class="form-group">
              <label for="">Nom</label>
              <input name="nom" class="form-control" value="<?php echo $categorie['nom'];?>">
            </div>

            <br>

            <div class="form-group">
              <label for="">Description</label>
              <textarea name="description" class="form-control"><?php echo $categorie['description'];?></textarea>
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

  <!-- Graphs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
  
  
  <script>

    $("#addform").submit(function(){
      if($("#nom").val() == ""){
        $("#blocknom").append("<p>This input field is required !!!</p>");
        return false;
      }
    })

    // Category deletion Pop up function
    function popUpDeleteCategorie(){
      return confirm("Do you really want to delete this category?");
    }
  </script>
  

 


















</body>

</html>