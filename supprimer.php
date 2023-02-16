<?php
  session_start();
  $id= $_GET['id'];
  if ($_SESSION['logedin']==true){            
    require "cnx.php";   
    try {         
        $operation = $connexion->prepare( "DELETE FROM emloyee WHERE ID = $id");
        $operation->execute();
        $user = $operation->fetchAll(PDO::FETCH_OBJ);
        header("Location:Home.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
  }else{
    header("Location:Login.php");
  }
?>