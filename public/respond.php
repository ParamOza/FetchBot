<?php

    $r = urlencode($_REQUEST['q']);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://us-central1-mh18-222116.cloudfunctions.net/api?q=$r");//

    $data = array($name => $cfile);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FORBID_REUSE,true);

    $resp = curl_exec($ch);
    curl_close($ch);
    echo $resp;
 ?>
