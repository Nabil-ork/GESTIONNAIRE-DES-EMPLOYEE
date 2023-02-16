<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 670px;
  height: auto;
  border-collapse: collapse;
  margin: 20px;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$id = intval($_GET['id']);
require "cnx.php";
$sql=("SELECT * FROM emloyee WHERE id = $id;");
$op=$connexion->prepare($sql);
$op->execute();
$result=$op->fetchAll(PDO::FETCH_OBJ);

echo "<table>
<tr>
<th>ID</th>
<th>Nom</th>
<th>Prenom</th>
<th>Telephone</th>
<th>Salaire</th>
<th>Address</th>
</tr>";
foreach($result as $row) {
  echo "<tr>";
  echo "<td>" . $row->ID . "</td>";
  echo "<td>" . $row->nom . "</td>";
  echo "<td>" . $row->prenom . "</td>";
  echo "<td> 0" . $row->tel . "</td>";
  echo "<td>" . $row->salaire . " DH </td>";
  echo "<td>" . $row->address . "</td>";
  echo "</tr>";
}
echo "</table>";

?>
</body>
</html>