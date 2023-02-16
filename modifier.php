
<?php 
    // commencer la session
    session_start();
    //inclure la page de connexion et le menu
    require "menu.php";
    require "cnx.php";
    //vérifier que l'utilisateur connecté
    if ($_SESSION['logedin']==true){
    $id = $_GET['id'];
    $operation = $connexion->prepare("SELECT * FROM Emloyee WHERE id = $id");
    $operation->execute();
    $userss = $operation->fetchAll(PDO::FETCH_OBJ);
    //vérifier que le bouton modifier a bien été cliqué            
    if(isset($_POST['modifier'])){
        $newid = $_POST["id"];
        $nom = strtoupper($_POST["nom"]);
        $prenom = strtoupper($_POST["prenom"]);
        $salaire = $_POST["salaire"];
        $telephone = $_POST["telephone"];
        $address = strtoupper($_POST["address"]);
        try{
        //requête de modification
        $operation = $connexion->prepare("UPDATE emloyee SET ID='$newid', nom = '$nom' , prenom = '$prenom' , salaire = '$salaire',tel='$telephone', address='$address' WHERE ID = $id;");
        $operation->execute();
        $user = $operation->fetchAll(PDO::FETCH_OBJ);
        //si la requête a été effectuée avec succès , on fait une redirection
        header("location: Home.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Modifier</title>
    </head>
    <body id="bodyajouter" >
    <div style="background-color: #fff" id="">
    <form  method="post">
    <?php
    foreach($userss as $row){ 
    echo 
    '<label for="id">ID :</label>
    <input type="text" name="id" id="id" value="'.$row->ID.'">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" value="'.$row->nom.'">
    <label for="prenom">Prenom :</label>
    <input type="text" name="prenom" id="prenom" value="'.$row->prenom.'" >
    <label for="salaire">Salaire :</label>
    <input type="text" name="salaire"  id="salaire" value="'.$row->salaire.'" >
    <label for="address">Telephone :</label>
    <input type="text" name="telephone"  id="telephone" value="'.$row->tel.'" >
    <label for="address">Address : </label>
    <input type="text" name="address" id="address" value="'.$row->address.'" >'
    ;}
    ?>
<input type="submit" value="modifier" name="modifier">
</form>
</div>
<?php

?>
<?php
}else{
        header("Location:Login.php");
    }
?>
</body>
</html>
