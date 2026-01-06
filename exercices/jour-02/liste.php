<?php
    $groceries = [
        "tomate",
        "oignon",
        "betterave",
        "patate",
        "courgette",
    ];                          //Création du tableau 

    echo $groceries[0];         // afficher le première article
    echo "<br>";
    echo $groceries[count($groceries)-1]; // afficher le dernière article
    echo "<br>";
    echo count($groceries);     // donner le nombre d'article
    echo "<br>";

    $groceries[] = "salade";    // ajouter un article
    $groceries[] = "orange";    // ajouter un article
    unset($groceries[2]);       // supprimer un article
    echo var_dump($groceries)   // afficher le tableau
?>