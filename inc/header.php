


<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">

      <a class="navbar-brand" href="index.php">E-SHOP</a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Product categories
            </a>


            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               
              <?php   
                   
                   foreach($categories as $categorie){
                      print '<li><a class="dropdown-item" href="#">'.$categorie['nom'].'</a></li>';
                   }
                
                ?>

            </ul>


          </li>
          <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Dropdown
              </button>
           <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
             <button class="dropdown-item" type="button">Action</button>
             <button class="dropdown-item" type="button">Another action</button>
             <button class="dropdown-item" type="button">Something else here</button>
            </div>
         </div>
           
          
          

          <?php 
          if(isset($_SESSION['nom'])){

            print'
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="profile.php">profile</a>
          </li>';
            
          }else{
            print'
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>';
          }
          ?>
        </ul>














        <form class="d-flex" action="index.php" method="POST">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
          <button class="btn btn-outline-success" type="submit" name="click">Search</button>
        </form>

        <?php 
          if(isset($_SESSION['nom'])){
            print '
            <a href="logout.php" class="btn btn-primary">Logout</a>
            ';
          }
        ?>
      </div>
    </div>
  </nav>