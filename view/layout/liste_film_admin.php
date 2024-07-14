<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film2023_d3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("La connexion a échoué : " . $conn->connect_error);
}

$sql = "SELECT * FROM film";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Titre: " . $row["titre_film"]. " - Type: " . $row["type_film"]. " - Date de sortie: " . $row["date_sortie"]. " - <a href='modifier_film.php?id=" . $row["titre_film"]. "'>Modifier</a> - <a href='supprimer_film.php?id=" . $row["titre_film"]. "'>Supprimer</a><br>";
  }
} else {
  echo "Aucun résultat n'as été trouvé";
}

$conn->close();
?>
