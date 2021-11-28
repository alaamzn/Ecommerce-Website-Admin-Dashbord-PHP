<?php 

//include "../DBconnection.php";


function DatabaseConnection(){

    $servername = "localhost";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "ecommerce";
    
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    
      return $conn;
    }




function loadCategories(){

    // 1 - Database Connection
    $conn = DatabaseConnection();
    // 2 - Request Creation
    $request = "SELECT * FROM categorie";

    // 3 - Request Execution
    $result = $conn->query($request);
    
    // 4 - Request Result
    $categories = $result->fetchAll();
    
    return $categories;
 }


function loadProducts(){

    // 1 - Database Connection
    $conn = DatabaseConnection();
    // 2 - Request Creation
    $request = "SELECT * FROM produit";

    // 3 - Request Execution
    $result = $conn->query($request);
    
    // 4 - Request Result
    $produits = $result->fetchAll();

    return $produits;
}
   
function searchProducts($keywords){
   // 1 - Database Connection
   $conn = DatabaseConnection();

   // 2 - Request Creation
   $request = "SELECT * FROM produit WHERE nom LIKE '%$keywords%'";
   //You should put '' for keywords
   
   // 3 - Request Execution
   $result = $conn->query($request);
    
    // 4 - Request Result
    $searchedProducts = $result->fetchAll(); 
    
    return $searchedProducts;
}

function getProductById($id){
    // 1 - Database Connection
    $conn = DatabaseConnection();

    //2 - Request Creation
    $request = "SELECT * FROM produit WHERE id = $id";

    // 3 - Request execution 
    $result = $conn->query($request);

    // 4 - Request Result
    
    $product = $result->fetch();
  
    return $product;
}

function addVisitor($data){
   // 1 - DB connection
   $conn = DatabaseConnection();

   $mpHash = md5($data["password"]);
   // 2 - Request Creation
   $request = "INSERT INTO visiteur(email, prenom, nom, telephone, mp) VALUES('".$data["email"]."', '".$data["firstname"]."', '".$data["familyname"]."', '".$data["phonenumber"]."', '".$mpHash."')";
   // 3 - Request Execution
   $result = $conn->query($request);
   //var_dump($result);
   if($result){
       return true;
   } else{
       return false;
   }

}

function loadCustomers(){
    // 1. Database Connection 
    $conn = DatabaseConnection();

    // 2. Request Creation 
    $request = "SELECT * FROM visiteur WHERE etat=0";

    // 3. Request Execution
    $result = $conn -> query($request);
    
    // 4. Request result retrieval
    $customers = $result -> fetchAll();

    return $customers;
}
function loginUser($data){
   // 1 - DB connection
   $conn = DatabaseConnection();

   //2 - Retrieving Form Data
   $email = $data["email"];
   $mp = md5($data["password"]);
   
   // 3 - Request Creation
   $request = "SELECT * FROM visiteur WHERE email='$email' AND mp='$mp'";

   // 4 - Request Execution
   $result = $conn->query($request);

   $user = $result->fetch();
   
   return $user;
}

function loginAdmin($data){

    // 1 - DB connection
    $conn = DatabaseConnection();
 
    //2 - Retrieving Form Data
    $email = $data["email"];
    $mp = md5($data["password"]);
    
    // 3 - Request Creation
    $request = "SELECT * FROM admin WHERE email='$email' AND mp='$mp'";
 
    // 4 - Request Execution
    $result = $conn->query($request);
 
    $user = $result->fetch();
    
    return $user;
 }
function loadStocks(){
    // 1. DB connection
    $conn = DatabaseConnection();
    
    // 2. Request creation
    $request = "SELECT nom, stocks.id, quantite FROM produit, stocks WHERE produit.id=stocks.produit";

    
    // 3. Request execution
    $result = $conn -> query($request);

    $stocks = $result ->fetchAll();

    return $stocks;

}

?>