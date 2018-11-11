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
                <form class="w-75 mx-auto mt-3 p-3 light-bg" action="/doreg.php" method="post">
                    <input type="hidden" name="csrf" value="'.$_SESSION['tok'].'">
                    
                    <div class="form-group">
                        <label>Phone Number </label>
                        <input class="form-control" type="text" name="phone" placeholder="1 (555)324-6172">
                    </div>

                    <div class="form-group">
                        <label>Email </label>
                        <input class="form-control" type="text" name="email" placeholder="user@web.com">
                    </div>

                    <div class="form-group">
                        <label>Password </label>
                        <input class="form-control" type="passsword" name="passwd">
                    </div>
                </form>';
        $in = str_replace('{Plan}', 'a Prepaid Plan', $in);
        $in = str_replace('{SignupForm}', $f, $in);
        return $in;
    }

 ?>
