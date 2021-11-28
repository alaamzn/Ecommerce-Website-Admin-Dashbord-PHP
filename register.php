<?php


session_start();

if(isset($_SESSION['nom'])){
  header('location:profile.php');
}

include'inc/functions.php';

$showRegistrationAlert = 0;

$categories = loadCategories();

//var_dump($categories);


if(!empty($_POST)){ // The register button is clicked
  
  if(addVisitor($_POST)){
    $showRegistrationAlert = 1;
    $inputFields = $_POST;
    /*
    foreach($inputFields as $input){
    echo $input.'  ||';
 
    }*/
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  
  <!-- Custom Css Stylesheet-->
  <link rel="stylesheet" href="./css/style.css">
   
  <!-- Sweet Alert --> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css"> 

  <title>Ecommerce Training Website</title>
</head>

<body>
  <!--Navbar -->
  <?php  
  
   include"inc/header.php";
   
  ?>
  <!--End Navbar -->



  <!--Register Form-->
  <div class="login-form col-12 p-5">
    <h1 class="text-center">Register</h1>
    <form action="register.php" method="POST" class="register-form">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">first Name</label>
        <input name="firstname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">family name</label>
        <input name="familyname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Phone number</label>
        <input name="phonenumber" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" name="mp" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
      </div>

      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
  <!--End Login Form-->



  <?php 
  
  include 'inc/footer.php';
  
  ?>
  <!-- Bootstrap Script-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
  </script>

  <!-- Sweet Alert Library-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
  <?php 

  if($showRegistrationAlert == 1){
  print "<script>
  
  Swal.fire({
  title: 'Success!',
  text: 'Account created successfully !!',
  icon: 'success',
  confirmButtonText: 'Ok',
  timer: 5000
})
  </script>";
}
  ?>
  
</body>

</html>