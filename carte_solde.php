<head>
    <link rel="stylesheet" href="CSS/carte_solde.css">
</head>
<section id="accueil">
    <div class="container_solde">
        <div class="container_bvn">
            <h2>
                <?php
                    session_start();
                    if (isset($_SESSION['nom_utilisateur'])) {
                        echo "Bonjour, " . $_SESSION['nom_utilisateur'] . " !";
                 }
                ?>
                Vous avez actuellement 999.999.999,99€
            </h2>
        </div>

        <div class="container_cards">
            <?php
            for ($i=0; $i < 10; $i++) { 
                echo'<div class="card">
                        <p>Variable Anniversaire</p>
                        <p>04/04/24</p>
                        <p class="positive"><span>+50.38</span>€</p>
                    </div>';
                    }
            ?>
        </div>
    </div>
</section>