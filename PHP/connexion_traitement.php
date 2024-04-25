<?php
session_start();
$mysqli = new mysqli("84.46.245.191", "u10477_7ZRiPoQ2Rw", "Mf.@RFmKXYdfKK.4cBQrTZ1@", "s10477_FineAns");

if ($mysqli->connect_error) {
    die("Connexion échouée : " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Requête SQL pour récupérer l'utilisateur avec l'email fourni
    $sql = "SELECT * FROM utilisateurs WHERE email = '$email'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $utilisateur = $result->fetch_assoc();
        
        // Vérification du mot de passe hashé
        if (password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
            // Mot de passe correct, authentification réussie
            // L'utilisateur est authentifié avec succès, créer une session et rediriger vers la page d'accueil
 
            // Enregistrer le nom d'utilisateur dans la session
            $_SESSION['nom_utilisateur'] = $utilisateur['nom'];
            // Vous pouvez rediriger vers une page d'accueil par exemple
            header("Location: ../../../index.php");
            exit();
        } else {
            // Mot de passe incorrect
            echo "Identifiants invalides";
        }
    } else {
        // L'utilisateur n'existe pas
        echo "Identifiants invalides";
    }
    
    $mysqli->close();
}
?>
