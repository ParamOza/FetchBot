<?php
    $r = $_REQUEST;
    $stringin = file_get_contents(getcwd()."/pagefillins/register.html");

    $csrf_tok = bin2hex(random_bytes(32));
    $_SESSION['tok'] = $csrf_tok;

    if($r['plan'] == 'pp'){
        echo prepStr($stringin);
    } else if($r['plan'] == 'sub'){
        //echo sub($stringin);
    }

    function prepStr($in){
        $f = '
                <form class="w-75 mx-auto light-bg" action="/doreg.php" method="post">
                    <div class="form-group">
                        <input type="hidden" name="csrf" value="'.$_SESSION['tok'].'">
                        <label>Email </label> <input type="text" name="email" placeholder="user@web.com">
                    </div>
                </form>';
        $in = str_replace('{Plan}', 'a Prepaid Plan', $in);
        $in = str_replace('{SignupForm}', $f, $in);
        return $in;
    }

 ?>
