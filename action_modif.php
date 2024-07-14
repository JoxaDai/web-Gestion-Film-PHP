<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modification d'un Film</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Modification d'un Film</h1>
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


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $titre = $_POST['titre'];
                $type = $_POST['type'];
                $date_sortie = $_POST['date_sortie'];
                $resume = $_POST['resume']; 

                // Upload de l'image_affiche
                $target_dir = "webroot2/img";
                $target_file = $target_dir . basename($_FILES["image_affiche"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Vérifier si le fichier image est réel ou une fausse image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["image_affiche"]["tmp_name"]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        echo "Le fichier n'est pas une image.";
                        $uploadOk = 0;
                    }
                }

                // Vérifier si le fichier existe déjà
                if (file_exists($target_file)) {
                    echo "Désolé, le fichier existe déjà.";
                    $uploadOk = 0;
                }

                // Vérifier la taille de l'image
                if ($_FILES["image_affiche"]["size"] > 500000) {
                    echo "Désolé, votre fichier est trop volumineux.";
                    $uploadOk = 0;
                }

                // Autoriser certains formats de fichier
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
                    $uploadOk = 0;
                }

                // Vérifier si $uploadOk est défini à 0 par une erreur
                if ($uploadOk == 0) {
                    echo "Désolé, votre fichier n'a pas été téléchargé.";

                // Si tout est ok, essayer d'uploader le fichier
                } else {
                    if (move_uploaded_file($_FILES["image_affiche"]["tmp_name"], $target_file)) {
                        echo "Le fichier ". htmlspecialchars( basename( $_FILES["image_affiche"]["name"])). " a été téléchargé.";

                        // Mettre à jour la base de données avec le chemin de l'image
                        $image_path = "webroot2/img" . basename($_FILES["image_affiche"]["name"]);

                        $sql = "UPDATE film SET type_film='$type', date_sortie='$date_sortie', resume='$resume', image_affiche='$image_path' WHERE titre_film='$titre'";

                        if ($conn->query($sql) === TRUE) {
                            echo "Film modifié avec succès !";
                        } else {
                            echo "Erreur lors de la modification : " . $conn->error;
                        }

                    } else {
                        echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                    }
                }
            }

            $conn->close();
        ?>

        

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titre">Titre du Film</label>
                <input type="text" class="form-control" id="titre" name="titre" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" id="type" name="type" required>
            </div>
            <div class="form-group">
                <label for="date_sortie">Date de Sortie</label>
                <input type="date" class="form-control" id="date_sortie" name="date_sortie" required>
            </div>
            <div class="form-group">
                <label for="resume">Résumé</label>
                <textarea class="form-control" id="resume" name="resume" rows="3" required></textarea>
            </div>
            <div class="form-group">
            <label for="image_affiche">Image d'affiche</label>
                <input type="file" class="form-control-file" id="image_affiche" name="image_affiche">
            </div>
            <button type="submit" class="btn btn-primary">Modifier le Film</button>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
        <label for="selectFilm">Sélectionner un film</label>
        <select class="form-control" id="selectFilm" name="titre">
            <?php
                // Récupérer la liste des titres de films depuis la base de données
                $sql = "SELECT titre_film FROM film";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['titre_film']."'>".$row['titre_film']."</option>";
                    }
                }
            ?>
        </select>
    </div>
</form>
        </form>

     

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

