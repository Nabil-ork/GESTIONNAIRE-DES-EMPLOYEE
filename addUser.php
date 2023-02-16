<?php 
    // commencer la session
    session_start();
    //inclure la page de connexion et le menu
    require "menu.php";
    require "./cnx.php"; 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Ajouter un administtrateur</title>
    <style>
        body { 
            background-color: aquamarine;
        }
    </style>
</head>
<body>
<form>
  <div class="text-center form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
  <?php
    if ($_SESSION['logedin']==true){
        //vérifier que le bouton ajouter a bien été cliqué
        if (isset($_POST['ajouter'])) {            
            $mdp = $_POST["password"];
            $email = strtoupper($_POST["email"]);
            try {
                // requête de l'insertion
                $operation = $connexion->prepare("INSERT INTO users(email,mdp,name) values('$email','$mdp')");
                $operation->execute(); 
    ?>
                <div class="alert alert-success" role="alert">
                L'administrateur a été ajouté avec success
                </div>
        <?php
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    
    
    }else{
        header("Location:Login.php");
    }
?>
</form>
</body>
</html>
