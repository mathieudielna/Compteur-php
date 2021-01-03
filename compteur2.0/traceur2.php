<?php

$traceur=fopen('traceur2.txt', 'c+b');
$appareil=gethostname();

//OS
$user_agent = getenv("HTTP_USER_AGENT");

if (strpos($user_agent, "Win") !== FALSE)
    $os = "sous Windows";
elseif ((strpos($user_agent, "Mac") !== FALSE) || (strpos($user_agent, "PPC") !== FALSE))
    $os = "sous Mac";
elseif (strpos($user_agent, "Linux") !== FALSE)
    $os = "sous Linux";
elseif (strpos($user_agent, "FreeBSD") !== FALSE)
    $os = "sous FreeBSD";
elseif (strpos($user_agent, "SunOS") !== FALSE)
    $os = "sous SunOS";
elseif (strpos($user_agent, "IRIX") !== FALSE)
    $os = "sous IRIX";
elseif (strpos($user_agent, "BeOS") !== FALSE)
    $os = "sous BeOS";
elseif (strpos($user_agent, "OS/2") !== FALSE)
    $os = "sous OS/2";
elseif (strpos($user_agent, "AIX") !== FALSE)
    $os = "sous AIX";
else
    $os = "Autre";
/*** Après on fait ce qu'on souhaite de l'information :
* affichage, stockage dans une base de données ...
**/

//affichage du navigateur
$user_agent = getenv("HTTP_USER_AGENT");

if ((strpos($user_agent, "Nav") !== FALSE) || (strpos($user_agent, "Gold") !== FALSE) ||
(strpos($user_agent, "X11") !== FALSE) || (strpos($user_agent, "Mozilla") !== FALSE) ||
(strpos($user_agent, "Netscape") !== FALSE)
AND (!strpos($user_agent, "MSIE") !== FALSE) 
AND (!strpos($user_agent, "Konqueror") !== FALSE)
AND (!strpos($user_agent, "Firefox") !== FALSE)
AND (!strpos($user_agent, "Safari") !== FALSE))
        $browser = "Netscape";
elseif (strpos($user_agent, "Opera") !== FALSE)
        $browser = "Opera";
elseif (strpos($user_agent, "MSIE") !== FALSE)
        $browser = "MSIE";
elseif (strpos($user_agent, "Lynx") !== FALSE)
        $browser = "Lynx";
elseif (strpos($user_agent, "WebTV") !== FALSE)
        $browser = "WebTV";
elseif (strpos($user_agent, "Konqueror") !== FALSE)
        $browser = "Konqueror";
elseif (strpos($user_agent, "Safari") !== FALSE)
        $browser = "Safari";
elseif (strpos($user_agent, "Firefox") !== FALSE)
        $browser = "Firefox";
elseif ((stripos($user_agent, "bot") !== FALSE) || (strpos($user_agent, "Google") !== FALSE) ||
(strpos($user_agent, "Slurp") !== FALSE) || (strpos($user_agent, "Scooter") !== FALSE) ||
(stripos($user_agent, "Spider") !== FALSE) || (stripos($user_agent, "Infoseek") !== FALSE))
        $browser = "Bot";
else
        $browser = "Autre";

//Date et heure
$date=date("d/m/Y");
$heure=date("H:i:s");

//adresse ip
function getIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }

$ip=getIp();


fwrite($traceur, "Dernier appareil connecter $appareil sous $os avec $browser le $date a $heure avec cette adresse IP: $ip ");
fseek($traceur, filesize('traceur2.txt'));


?>


