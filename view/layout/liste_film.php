<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film2023_d3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("La connexion a échoué : " . $conn->connect_error);
}

$sql = "SELECT film.titre_film, type.nom_type, film.date_sortie, film.image_affiche FROM film JOIN type ON film.type_film = type.nom_type";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Titre: " . $row["titre_film"]. " - Type: " . $row["nom_type"]. " - Date de sortie: " . $row["date_sortie"]. " - <img src='" . $row["image_affiche"]. "' alt='Affiche' /><br>";
  }
} else {
  echo "Aucun résultat trouvé";
}

$conn->close();
?>
