

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>My First PHP</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
</head>
<body>
<div class="container">
<?php
$errEmail = $errPass= $errName="";
if(isset($_POST["submit"])) {

$email = $_POST['email'];
$name = $_POST['user'];
$password = $_POST['password'];
$valid=true;
// Check if name has been entered
if(empty($_POST['user'])){
$errName= 'Please enter your user name';
$valid=false;
}
// Check if email has been entered and is valid
if(empty($_POST['email'])){
$errEmail = 'Please enter a valid email address';
$valid=false;
}
// check if a valid password has been entered
if(empty($_POST['password']) || (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0)) {
$errPass = '<p class="errText">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit</p>';
$valid=false;
}
if($valid){
echo "The form has been submitted";
}

}
?>
<!-- end php code -->
<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-group row">
<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
<?php echo $errEmail;?>
</div>
</div>
<div class="form-group row">
<label for="inputUser" class="col-sm-2 col-form-label">User Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="inputUser" name="user" placeholder="Username">
<?php echo $errName; ?>
</div>
</div>
<div class="form-group row">
<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
<?php echo $errPass; ?>
</div>
</div>
<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
<input type="submit" value="Sign in" name="submit" class="btn btn-primary"/>
</div>
</div>
</form>
</div>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>My First PHP</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
</head>
<body>
<div class="container">
<?php
$errEmail = $errPass= $errName="";
if(isset($_POST["submit"])) {

$email = $_POST['email'];
$name = $_POST['user'];
$password = $_POST['password'];
$valid=true;
// Check if name has been entered
if(empty($_POST['user'])){
$errName= 'Please enter your user name';
$valid=false;
}
// Check if email has been entered and is valid
if(empty($_POST['email'])){
$errEmail = 'Please enter a valid email address';
$valid=false;
}
// check if a valid password has been entered
if(empty($_POST['password']) || (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0)) {
$errPass = '<p class="errText">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit</p>';
$valid=false;
}
if($valid){
echo "The form has been submitted";
}

}
?>
<!-- end php code -->
<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-group row">
<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
<?php echo $errEmail;?>
</div>
</div>
<div class="form-group row">
<label for="inputUser" class="col-sm-2 col-form-label">User Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="inputUser" name="user" placeholder="Username">
<?php echo $errName; ?>
</div>
</div>
<div class="form-group row">
<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
<?php echo $errPass; ?>
</div>
</div>
<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
<input type="submit" value="Sign in" name="submit" class="btn btn-primary"/>
</div>
</div>
</form>
</div>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
