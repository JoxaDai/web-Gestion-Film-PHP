<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="webroot2/img/logo-cine.png" type="image/png">
    <title>Accueil film2023</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }

        /* Animation pour le footer */
        @keyframes slideIn {
            from {
                transform: translateY(100%);
            }
            to {
                transform: translateY(0);
            }
        }

        /* Style footer */
        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
            animation: slideIn 1s forwards; /* Ajout du slide auto au footer */
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

    <!-- Carrousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="webroot2/img/aile-ou-la-cuisse.jpg" class="d-block w-100" alt="film 1">
            </div>
            <div class="carousel-item">
                <img src="webroot2/img/tenet.jpg" class="d-block w-100" alt="film 2">
            </div>
            <div class="carousel-item">
                <img src="webroot2/img/joker.jpg" class="d-block w-100" alt="film 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Precedent</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>


<!-- Flashcards internaute -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="webroot2/img/aileoucuisseHD.jpg" class="card-img-top" alt="Film 1">
                <div class="card-body">
                    <h5 class="card-title">L'aile ou la cuisse (Remasterisé)</h5>
                    <p class="card-text">Date de sortie en salle : 14/09/2023</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="webroot2/img/tenet2.jpg" class="card-img-top" alt="Film 2">
                <div class="card-body">
                    <h5 class="card-title">Tenet 3D</h5>
                    <p class="card-text">Date de sortie en salle : 27/10/2023</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="webroot2/img/wonka.jpg" class="card-img-top" alt="Film 3">
                <div class="card-body">
                    <h5 class="card-title">Wonka</h5>
                    <p class="card-text">Date de sortie en salle : 13/12/2023</p>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Footer -->
    <footer>
        <p>BTS SIO 2 SLAM</p>
        <p>Site de gestion films CRUD créé par Rome Joachim</p>
    </footer>

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


