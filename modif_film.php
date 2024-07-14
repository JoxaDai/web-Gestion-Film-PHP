<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film2023_d3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("La connexion a échoué : " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT * FROM film WHERE titre_film = '$id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
} else {
  echo "Aucun résultat trouvé";
  exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Modifier le film "<?php echo $row['titre_film']; ?>"</h2>

<form action="action_modif.php" method="post">
  Titre du film:<br>
  <input type="text" name="titre" value="<?php echo $row['titre_film']; ?>">
  <br>
  Type du film (genre):<br>
  <input type="text" name="type" value="<?php echo $row['type_film']; ?>">
  <br>
  Date de sortie:<br>
  <input type="date" name="date_sortie" value="<?php echo $row['date_sortie']; ?>">
  <br>
  Résumé:<br>
  <textarea name="resume" rows="5" cols="40"><?php echo $row['resume']; ?></textarea>
  <br><br>
  <input type="submit" value="Enregistrer">
</form>

</body>
</html>
