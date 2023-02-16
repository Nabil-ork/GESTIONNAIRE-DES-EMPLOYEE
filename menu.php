<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2751d5d3c9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
     #divxx {
        height: 100%;
        border-radius: 3px;
        background-color: #fff;
        
     }   
    </style>
    <title>Document</title>
</head>
<body class="">
<div id="divxx" class="d-table col-md-2 m-5px fixed-top nav flex-column nav-pills" id="v-pills-tab"  role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="home.php" role="tab" aria-controls="v-pills-home" aria-selected=""><i class="fa-solid fa-house"></i>   Home</a>
  <a class="nav-link " id="v-pills-profile-tab" data-toggle="pill" href="ajouter.php" role="tab" aria-controls="v-pills-add" aria-selected="true"><i class="fa-solid fa-circle-plus"></i>   Ajouter</a>
  <a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="rechercher.php" role="tab" aria-controls="v-pills-adduser" aria-selected="false"><i class="fa-solid fa-magnifying-glass"></i>   Chercher</a>
  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="addUser.php" role="tab" aria-controls="v-pills-adduser" aria-selected="false"><i class="fa-solid fa-user-plus"></i>   Ajouter un admin</a>
  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="login.php" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa-solid fa-arrow-right-from-bracket"></i>   Se déconnecté</a>
  <h5 class="m-10px font-italic fixed-bottom"><?= "Bonjour, $_SESSION[name]" ?></h5>
</div>
</body>
</html>