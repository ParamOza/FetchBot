<?php
    $r = $_REQUEST;
    $stringin = file_get_contents(getcwd()."/pagefillins/register.html");

    $csrf_tok = bin2hex(random_bytes(32));
    $_SESSION['tok'] = $csrf_tok;

    if($r['plan'] == 'pp'){
        echo prepStr($stringin);
    } else {
        echo sub($stringin);
    }

    function prepStr($in){
        $f = '
                <form class="w-75 mx-auto mt-3 p-3 light-bg text-light" action="/doreg.php" method="post">
                    <input type="hidden" name="csrf" value="'.$_SESSION['tok'].'">

                    <div class="form-group row my-2">
                        <label class="ml-auto mr-2">Phone Number </label>
                        <input class="form-control col-5 ml-2 mr-auto" type="text" name="phone" placeholder="1 (555)324-6172">
                    </div>

                    <div class="form-group row my-3">
                        <label class="ml-auto mr-2">Email </label>
                        <input class="form-control col-6 ml-2 mr-auto" type="text" name="email" placeholder="user@web.com">
                    </div>

                    <div class="form-group row my-2">
                        <label class="ml-auto mr-2">Password </label>
                        <input class="form-control col-6 ml-2 mr-auto" type="passsword" name="passwd">
                    </div>

                    <div class="form-group row my-2">
                        <button type="submit" class="btn btn-info">Register</button>
                    </div>
                </form>';
        $in = str_replace('{Plan}', 'a Prepaid Plan', $in);
        $in = str_replace('{SignupForm}', $f, $in);
        return $in;
    }

 ?>
