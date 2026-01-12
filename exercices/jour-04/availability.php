<?php
$stock = 10;
$active = true;
$promoEndDate = "2026-12-01";

function disponible($stock,$active){
    if($stock>0 && $active ===true){
        echo "<p>Available</p>";
    } else{
        echo "<p>Unavailable</p>";
    }
}
function promo($promoEndDate){
    if(strtotime($promoEndDate)<strtotime("now")){
        echo "<p>Promo valid</p>";
    }else{
        echo "<p>Promo exceeds</p>";
    }
}

disponible($stock, $active);
promo($promoEndDate);



?>