<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film2023_d3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("La connexion à la BDD a échoué : " . $conn->connect_error);
}

$titre = $_GET['titre_film'];

// Supprimer l'image d'affiche si elle existe
$sql_img = "SELECT image_affiche FROM film WHERE titre_film='$titre'";
$result_img = $conn->query($sql_img);

if ($result_img->num_rows > 0) {
    $row = $result_img->fetch_assoc();
    $image_affiche = $row['image_affiche'];

    if (!empty($image_affiche) && file_exists($image_affiche)) {
        unlink($image_affiche);
    }
}

// Supprimer le film de la base de données
$sql = "DELETE FROM film WHERE titre_film='$titre'";

if ($conn->query($sql) === TRUE) {
  echo "Film supprimé avec succès !";
} else {
  echo "Erreur lors de la suppression : " . $conn->error;
}

$conn->close();
?>
 