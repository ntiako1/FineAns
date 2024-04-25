<!-- inscription_traitement.php -->
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);


    $mysqli = new mysqli("84.46.245.191", "u10477_7ZRiPoQ2Rw", "Mf.@RFmKXYdfKK.4cBQrTZ1@", "s10477_FineAns");

    // Vérifier la connexion
    if ($mysqli->connect_error) {
        die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
    }

    // Requête pour insérer les données dans la table membres
    $query = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES ('$nom', '$email', '$mot_de_passe')";

    if ($mysqli->query($query) === TRUE) {
        // Rediriger l'utilisateur vers la page de connexion
        header("Location: ./connexion_traitement.php");
        exit(); // Assure que le script se termine après la redirection
    } else {
        echo "Erreur lors de l'inscription : " . $mysqli->error;
    }

    // Fermer la connexion à la base de données
    $mysqli->close();
}
?>


