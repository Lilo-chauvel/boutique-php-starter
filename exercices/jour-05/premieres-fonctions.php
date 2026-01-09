
<?php	
function greet(){
    echo "Bienvenue sur la boutique !";
}
function greet_client($name){
    echo "Bienvenue " . $name;
}

greet();
echo "</br>";
greet_client("Lilo");
echo "</br>";
greet();
echo "</br>";
greet_client("Greg");
echo "</br>";
greet();
echo "</br>";
greet_client("Martin");
?>