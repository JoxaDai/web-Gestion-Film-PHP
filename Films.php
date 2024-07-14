<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste des Films</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>  
<body>

 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Site Film 2023</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Films.php">Liste des Films</a>
                </li>
                <li class="nav-item">
    <a class="nav-link" href="resume_film.php">Résumé des Films</a>
        </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="recherche.php">Recherche</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connexion.php">Connexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Liste des Films</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Titre du Film</th>
                    <th>Type</th>
                    <th>Date de Sortie</th>
                    <th>Image affiche</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connexion à la base de données
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "film2023_d3";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Récupération des données depuis la base de données
                $sql = "SELECT * FROM film";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['titre_film']."</td>";
                        echo "<td>".$row['type_film']."</td>";
                        echo "<td>".$row['date_sortie']."</td>";
                        echo "<td><img src='".$row['image_affiche']."' alt='Affiche' style='max-height: 100px;'></td>";
                        echo "<td><a href='action_modif.php?titre_film=".$row['titre_film']."'><button class='btn btn-primary'>Modifier</button></a> <a href='suppr_film.php?titre_film=".$row['titre_film']."'><button class='btn btn-danger'>Supprimer</button></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 résultats trouvés!";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>


    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
