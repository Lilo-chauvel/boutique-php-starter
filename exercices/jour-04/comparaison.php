<pre>
<?php
$a = 0;
$b = "";
$c = null;
$d = false;
$e = "0";

// Compare $a avec $b, $c, $d, $e en utilisant == puis ===
// Utilise var_dump() pour chaque comparaison

var_dump($a == $b);     //1
var_dump($a === $b);    //2
var_dump($a == $c);     //3
var_dump($a === $c);    //4
var_dump($a == $d);     //5
var_dump($a === $d);    //6
var_dump($a == $e);     //7
var_dump($a === $e);    //8

?>
</pre> 