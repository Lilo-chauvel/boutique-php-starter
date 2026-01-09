<?php
function formatPrice(float $amount, $currency = "€", $decimals = 2){
    echo number_format(round($amount, $decimals),$decimals) . $currency;
}

formatPrice(99.999);
formatPrice(99.999,"$");
formatPrice(99.999,"€",0);

?>