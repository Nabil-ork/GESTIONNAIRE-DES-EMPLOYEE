<?php
  session_start();
  //récupération de l'id dans le lien
  $id= $_GET['id'];
  if ($_SESSION['logedin']==true){ 
    //connexion a la base de données
    require_once "cnx.php";   
    try {
        //requête de suppression
        $operation = $connexion->prepare( "DELETE FROM emloyee WHERE ID = $id");
        $operation->execute();
        $user = $operation->fetchAll(PDO::FETCH_OBJ);
        header("Location:Home.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
  }else{
    //redirection vers la page Login.php
    header("Location:Login.php");
  }
?>
