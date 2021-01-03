<?php

function MyCounter($echo_output=true, $show_visits=true, $show_hits=true, $cookie_ttl=60) {
    if (!is_writable('count2.txt'))
        die('revoir permission.');
    else {
      $counter=file('count2.txt');
      $visits=intval($counter[0]);
      $hits=intval($counter[1]);
    }
    if ($show_hits)
        $hits++;
    if ($show_visits && $_COOKIE['MyCounter_visited']!='true') {
        $visits++;
        setcookie("MyCounter_visited", 'true', time()+$cookie_ttl*60);
    }
    $handle=fopen('count2.txt', 'w+');
    fwrite($handle, "$visits\n$hits");
    fclose($handle);
    
    if ($show_visits && $show_hits)
        $return=array($visits, $hits);
    elseif ($show_visits)
        $return=$visits;
    elseif ($show_hits)
        $return=$hits;
    if ($echo_output) {
        if (is_array($return))
            echo "Visiteurs: $visits, clics: $hits";
        else
            echo $return;
    }
    else {
        return $return;
    }
    
}

?>
