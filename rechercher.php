<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start();
require "cnx.php";
require "menu.php";
if ($_SESSION['logedin']==true){ 
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Rechercher des employeé</title>
    <script>
    function showUser(str) {
    if (str == "") {
        document.getElementById("affichage").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("affichage").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET","getemployee.php?id="+str,true);
        xmlhttp.send();
    }
    }
    </script>
</head>
<body class="w-50 p-3" id="bodychercher">
    <div id="divsearch" class=" container border border-success">
    <h2 class="mb-3" style="font-size:300%;"><center>Rechercher des employeé</center></h2>
    <form action="" >
    <select name="employee" onchange="showUser(this.value)" class="form-control border border-dark" >
        <option value="0">---Choisir un employeé---</option>
        <?php 
            $sql=("SELECT * FROM emloyee");
            $op=$connexion->prepare($sql);
            $op->execute();
            $list=$op->fetchAll(PDO::FETCH_OBJ);
            foreach($list as $user){
                ?>
            <option  value="<?= $user->ID ?>"><?= $user->ID." : ".$user->nom." ".$user->prenom?></option>
    <?php }}else{
    header("Location:Login.php");
    } ?>
    </select><br>
    </form>
    <div id="affichage"></div>
    </div>

</body>
</html>