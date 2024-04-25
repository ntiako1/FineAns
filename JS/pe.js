function p_e() {
    let montant = document.getElementById('montant').value;
    let pourcentage = document.getElementById('pourcentage').value;
    let resultAnnonce = document.getElementById('resultat');
    let erreur = document.getElementById('erreur');


    if(isNaN(montant) || isNaN(pourcentage)) {
        erreur.textContent = "Veuillez entrer un nombre valide"
        resultAnnonce.textContent = "...";
    } else {
        let result = (parseFloat(montant) * parseFloat(pourcentage)) / 100;
        resultAnnonce.textContent = result.toFixed(2);
        erreur.textContent = "";
    }
}