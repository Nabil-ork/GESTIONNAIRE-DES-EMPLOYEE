<?php 
  session_start() ;
  session_destroy();
  session_start() ;
  require "./cnx.php";
  if(isset($_POST['boutton-valider'])){  
 
    if(isset($_POST['email']) && isset($_POST['mdp'])) {  
      $email = strtoupper($_POST['email']) ;
      $mdp = $_POST['mdp'] ;
      $erreur = "" ;
      
        $operation = $connexion->prepare("SELECT * FROM users WHERE email = '$email' AND mdp = '$mdp'");
        $operation->execute();
        $user = $operation->fetchAll(PDO::FETCH_OBJ);
        if(count($user) == 1){
            $_SESSION['name'] = $user[0]->name;
            $_SESSION['logedin'] =true;
            $_SESSION['email'] = $email ;
            header("Location:Home.php") ;
        }else {
            $erreur = "Adresse Mail ou Mots de passe incorrectes !";
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="bodylogin">
   <section>
       <h1> Login </h1>
       <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>
       <form action="" method="POST">  <!--on ne mets plus rien au niveau de l'action , pour pouvoir envoyé les données  dans la même page -->
           <label>Adresse Mail</label>
           <input type="text" name="email">
           <label >Mots de Passe</label>
           <input type="password" name="mdp">
           <input type="submit" value="Valider" name="boutton-valider">
       </form>
   </section> 
</body>
</html>