<?php

echo '<div class="row">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Données saisies</h5>
            <p class="card-text">
            <p>Titre : ' . $titre . '</p>
            <p class="card-text">Nom auteur : ' . $nomAuteur . '</p>
            <p class="card-text">Civilité : ' . $civilite . '</p>
            <p class="card-text">Année de publication : ' . $annePubli . '</p>
            <p class="card-text">Nombre de page : ' . $nbPage . '</p>
            <p class="card-text">Catégorie : ' . $categorie . '</p>
            <p class="card-text">Prix : ' . $prix . '</p>
            <p class="card-text">Description courte : ' . $descript . '</p>
            <a href="achat.php?titre=' . $titre . '&nomAuteur=' . $nomAuteur . '&civilite=' . $civilite . '&annePubli=' . $annePubli . '&nbPage=' . $nbPage . '&categorie=' . $categorie . '&prix=' . $prix . '&descript=' . $descript . '" class="btn btn-primary">Acheter</a>
        </div>
    </div>
</div>';