<?php

    $r = urlencode($_REQUEST['q']);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://us-central1-mh18-222116.cloudfunctions.net/api?q=$r");

    $data = array($name => $cfile);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FORBID_REUSE,true);

    curl_exec($ch);
    //var_dump(curl_getinfo($ch)); DEBUG
    curl_close($ch);

 ?>
