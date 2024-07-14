<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Résumé des Films</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .film-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .film-image {
            max-width: 150px;
            margin-right: 20px;
        }

        .film-details {
            max-width: 500px;
        }
    </style>
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
        <h1>Résumé des Films</h1>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "film2023_d3";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("La connexion à la BDD a échoué : " . $conn->connect_error);
            }

            $sql = "SELECT titre_film, resume, image_affiche FROM film";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
                    <div class="film-container">
                        <img src="<?= $row['image_affiche'] ?>" alt="<?= $row['titre_film'] ?>" class="film-image">
                        <div class="film-details">
                            <h2><?= $row['titre_film'] ?></h2>
                            <p><?= $row['resume'] ?></p>
                        </div>
                    </div>
        <?php
                }
            } else {
                echo "Aucun film trouvé dans la bdd!";
            }

            $conn->close();
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
