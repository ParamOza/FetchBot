<?php
    $r = $_REQUEST;
    $stringin = file_get_contents(getcwd()."/pagefillins/register.html");

    $csrf_tok = bin2hex(random_bytes(32));
    $_SESSION['tok'] = $csrf_tok;

    if($r['plan'] == 'pp'){
        echo prep($stringin);
    } else {
        echo sub($stringin);
    }

    function prep($in){
        $f = '
                <form class="w-75 mx-auto mt-3 p-3 light-bg text-light" action="/doreg.php" method="post">
                    <h4 class="mb-1 text-light display-4">Sign up for {Plan}</h4>

                    <hr class="w-50 my-3 border-top border-light">

                    <input type="hidden" name="csrf" value="'.$_SESSION['tok'].'">
                    <input type="hidden" name="plan" value="prepay">

                    <div class="form-group row my-2">
                        <label class="ml-auto mr-2">Phone Number </label>
                        <input class="form-control col-5 ml-2 mr-auto" type="text" name="phone" placeholder="1 (555) 324-6172">
                    </div>

                    <div class="form-group row my-3">
                        <label class="ml-auto mr-2">Email </label>
                        <input class="form-control col-6 ml-2 mr-auto" type="text" name="email" placeholder="user@web.com">
                    </div>

                    <div class="form-group row my-2">
                        <label class="ml-auto mr-2">Password </label>
                        <input class="form-control col-6 ml-2 mr-auto" type="passsword" name="passwd">
                    </div>
                    <hr class="w-50 my-3 border-top border-light">
                    <div class="form-group row my-2">
                        <button type="submit" class="btn-lg btn-info mx-auto">Register</button>
                    </div>
                </form>';
        $men = file_get_contents(getcwd()."/pagefillins/register.html");
        $in = str_replace('{SignupForm}', $f, $in);
        $in = str_replace('{Plan}', 'a Prepaid Plan', $in);
        $in = str_replace('{Menu}', $men, $in);
        return $in;
    }

    function sub($in){
        $f = '
                <form class="w-75 mx-auto mt-3 p-3 light-bg text-light" action="/doreg.php" method="post">
                    <h4 class="mb-1 text-light display-4">Sign up for {Plan}</h4>

                    <hr class="w-50 my-3 border-top border-light">

                    <input type="hidden" name="csrf" value="'.$_SESSION['tok'].'">
                    <input type="hidden" name="plan" value="subscription">

                    <div class="form-group row my-2">
                        <label class="ml-auto mr-2">Phone Number </label>
                        <input class="form-control col-5 ml-2 mr-auto" type="text" name="phone" placeholder="1 (555) 324-6172">
                    </div>

                    <div class="form-group row my-3">
                        <label class="ml-auto mr-2">Email </label>
                        <input class="form-control col-6 ml-2 mr-auto" type="text" name="email" placeholder="user@web.com">
                    </div>

                    <div class="form-group row my-2">
                        <label class="ml-auto mr-2">Password </label>
                        <input class="form-control col-6 ml-2 mr-auto" type="passsword" name="passwd">
                    </div>
                    <hr class="w-50 my-3 border-top border-light">
                    <div class="form-group row my-2">
                        <button type="submit" class="btn-lg btn-info mx-auto">Register</button>
                    </div>
                </form>';

        $in = str_replace('{SignupForm}', $f, $in);
        $in = str_replace('{Plan}', 'a Subscription Plan', $in);
        return $in;
    }
 ?>
