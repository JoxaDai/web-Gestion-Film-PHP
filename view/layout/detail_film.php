<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film2023_d3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("La connexion a échoué : " . $conn->connect_error);
}

$id = $_GET['id']; // Supposons que l'id du film soit passé en paramètre dans l'URL

$sql = "SELECT film.titre_film, type.nom_type, film.date_sortie, film.resume, film.image_affiche FROM film JOIN type ON film.type_film = type.nom_type WHERE film.titre_film = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo "Titre: " . $row["titre_film"]. " - Type: " . $row["nom_type"]. " - Date de sortie: " . $row["date_sortie"]. " - Résumé: " . $row["resume"]. " - <img src='" . $row["image_affiche"]. "' alt='Affiche' /><br>";
} else {
  echo "Aucun résultat n'as été trouvé";
}

$conn->close();
?>
