<?php


session_start();

//if(isset($_SESSION['nom'])){
 //header('location:profile.php');
//}

include '../inc/functions.php';


$user = true;
//var_dump($categories);

if(!empty($_POST)){// Login Button Clicked
  $user = loginAdmin($_POST); // This variable stores the user   
  //var_dump($user); 
  if(is_array($user) && count($user) > 0){// User Connected
    

    session_start();//Starting the user session
    // Creating the user session variables
    $_SESSION['id'] = $user['id'];
    $_SESSION['nom'] = $user['nom'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['mp'] = $user['mp'];

   
   
    header('location:admin_profile.php');//
    //Redirecting the user to the profile page

  }



}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Custom Css Stylesheet-->
    <link rel="stylesheet" href="../css/style.css">
    <title>Ecommerce Training Website</title>


    <!-- Sweet Alert --> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css"> 
</head>
<body>
    


    <!--Login Form-->
    <div class="login-form col-12 p-5">

        <h1>Espace Administrateur</h1>
        <h2 class="text-center">Login</h2>

    <form action="login.php" method="post">
        <div class="mb-3 py-4">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
    <!--End Login Form-->


    <?php 
  
  include '../inc/footer.php';
  
  ?>



    <!-- Bootstrap Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
  <?php 

  if(!$user){// If there is no user 
  print "<script>
  
  Swal.fire({
  title: 'Error',
  text: 'User Not Found',
  icon: 'error',
  confirmButtonText: 'Ok',
  timer: 5000
})
  </script>";
}
  ?>

</body>
</html>