<?php

function MyCounter($echo_output=true, $show_visits=true, $show_hits=true, $cookie_ttl=60) {
    if (!is_writable('count.txt'))
        die('File count.txt dows not have write permissions. Please set them accordingly and then try again.');
    else {
      $counter=file('count.txt');
      $visits=intval($counter[0]);
      $hits=intval($counter[1]);
    }
    if ($show_hits)
        $hits++;
    if ($show_visits && $_COOKIE['MyCounter_visited']!='true') {
        $visits++;
        setcookie("MyCounter_visited", 'true', time()+$cookie_ttl*60);
    }
    $handle=fopen('count.txt', 'w+');
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
            echo "Visits: $visits, Hits: $hits";
        else
            echo $return;
    }
    else {
        return $return;
    }
}

?>
