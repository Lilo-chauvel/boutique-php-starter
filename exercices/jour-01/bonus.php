<pre>
<?php
// Au lieu de :
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// Tu peux écrire :
$page = $_GET['page'] ?? 1;
echo $page;

// À toi : utilise ?? pour récupérer ces paramètres avec défauts
$tri = $_GET['tri'] ?? 'nom';
echo $tri;
$ordre = $_GET['ordre'] ?? 'asc';
echo $ordre;
$limite = $_GET['limite'] ?? 10;
echo $limite;

$valeur = $a ?? $b ?? $c ?? 'aucune valeur trouvée'; // Ça veut dire : si $a existe → prends $a ,sinon si $b existe → prends $b ,sinon si $c existe → prends $c ,sinon → 'aucune valeur trouvée’
?>
</pre>