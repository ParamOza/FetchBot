<?php
    session_start();
    if(array_key_exists('askedalot', $_SESSION)){
        $_SESSION['askedalot'] += 1;
    } else {
        $_SESSION['askedalot'] = 1;
        $_SESSION['first'] = strtotime('+10 minutes');
    }

    if(($_SESSION['first'] - time()) < 0){
        $_SESSION['askedalot'] = 1; // Whatever.
    }
    if($_SESSION['askedalot'] > 6){
        echo 'Calm down.  Only 6 questions per 10 minutes allowed on the website!';
        exit;
    }echo $_SESSION['askedalot'];

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
