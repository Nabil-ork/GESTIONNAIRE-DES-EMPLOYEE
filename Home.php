<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/2751d5d3c9.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <title>Home</title>

    </head>
    <body  id="bodyhome">
        <div class="container">
            <table>
                <tr id="items">
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Salaire</th>
                    <th>Telephone</th>
                    <th>Addresse</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
    <?php
    if ($_SESSION['logedin']==true){            
        require "cnx.php";
        require "menu.php";            
        $operation = $connexion->prepare("SELECT * FROM emloyee");
        $operation->execute();
        $user = $operation->fetchAll(PDO::FETCH_OBJ);
        if(count($user) == 0){
            echo "Il n'y a pas encore d'employé ajouter !" ;
        }else {
        foreach($user as $row){ ?>
        <tr>
            <td name="id"><?=$row->ID?></td>
            <td><?=$row->nom?></td>
            <td><?=$row->prenom?></td>
            <td><?=$row->salaire?> DH</td>
            <td>0<?=$row->tel?></td>
            <td><?=$row->address?></td>
            <td><a href="modifier.php?id=<?=$row->ID?>"><i class="fa-solid fa-pen"></i></a></td>
            <td><a href="supprimer.php?id=<?=$row->ID?>"><i class="fa-solid fa-trash-can"></i></a></td>
        </tr>
        <?php
    }
                        
}
                    

}else{
    header("Location:Login.php");
}
?>