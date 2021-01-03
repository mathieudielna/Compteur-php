<?php

include 'MyCounter.php';

$counts=MyCounter(false);

echo "Compteur de DIELNA Mathieu"."<br> ";
echo $counts[0]." visiteurs<br> et  ";
echo $counts[1]." clics sur mon liens";

?>
