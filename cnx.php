<?php
        $database = "mysql:host=localhost;dbname=project";
        $user = "root";
        $password = "0000";
        try {
            $connexion = new PDO($database, $user, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
?>