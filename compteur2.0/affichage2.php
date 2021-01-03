<?php

include 'compteur2.php';
include 'traceur2.php';

$counts=MyCounter(false);

echo "<center>"."<h3>Compteur de DIELNA Mathieu</h3 >"."<br> ";

//affichage du nom de la page
echo "<b>".basename(__FILE__)."</b>"."<br>";

echo "Vous etes le ". $counts[0]."eme visiteur<br> et  ";

echo $counts[1]." clics sur mon lien"."<br>";


  




?>