<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter</title>
</head>
<body id="bodyajouter">
    <?php 
    // commencer la session
    session_start();
    //inclure la page de connexion et le menu
    require "menu.php";
    require "./cnx.php"; 
    ?>
    <section>
    <h2>Ajouter un Employee </h2>
    <form id="formajouter" action="" method="post">
        <dl>
            <dt><label for="id">ID :</label></dt>
            <dd><input type="text" name="id" id="id" required></dd>
            <dt><label for="nom">Nom :</label></dt>
            <dd><input type="text" name="nom" id="nom" required></dd>
            <dt><label for="prenom">Prenom :</label></dt>
            <dd><input type="text" name="prenom" id="prenom" required></dd>
            <dt><label for="salaire">Salaire :</label></dt>
            <dd><input type="text" name="salaire" id="salaire" required></dd>
            <dt><label for="address">Telephone :</label></dt>
            <dd><input type="text" name="telephone" id="telephone" required></dd>
            <dt><label for="address">Address : </label></dt>
            <dd><input type="text" name="address" id="address" required></dd>
        </dl>
        <input type="submit" value="Ajouter" name="ajouter">
    </form>
    </section>
    <?php
    // si l'utilisateur connecté il peut ajouter un employee
    if ($_SESSION['logedin']==true){
        if (isset($_POST['ajouter'])) {
            $id = $_POST["id"];
            $nom = strtoupper($_POST["nom"]);
            $prenom = strtoupper($_POST["prenom"]);
            $salaire = $_POST["salaire"];
            $telephone = $_POST["telephone"];
            $address = strtoupper($_POST["address"]);
            try {
                $operation = $connexion->prepare("INSERT INTO emloyee(ID,nom,prenom,address,salaire,tel) values('$id','$nom','$prenom','$address','$salaire','$telephone')");
                $operation->execute(); 
                ?>
                <div class="alert alert-success" role="alert">
                L'employeé a été ajouté avec success
                </div>
        <?php
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        ?>
    <?php
    }else{
        // si l'utilisateur non connecte il va redirecté vers la page Login
        header("Location:Login.php");
    }
    ?>
</body>
</html>
