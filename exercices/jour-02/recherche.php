<?php
    $category =[
        "Vêtements", 
        "Chaussures", 
        "Accessoires", 
        "Sport",
    ];
    echo (in_array("Chaussures",$category))? "Trouvé!" : "Non trouvé" ;  // Trouvé!
    echo "<br>";
    echo (in_array("Électronique",$category))? "Trouvé!" : "Non trouvé" ; // Non trouvé
    echo "<br>";
    echo array_search("Sport",$category); // 3
?>