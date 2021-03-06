<html lang="en" class="gr__blackrockdigital_github_io"><link type="text/css" id="dark-mode" rel="stylesheet" href=""><style type="text/css" id="dark-mode-custom-style"></style><head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mateo Silver, Karsey Renfert, Param Oza, Miles Boswell">

    <title>Fetch Bot</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

  </head>

  <body id="page-top" data-gr-c-s-loaded="true" cz-shortcut-listen="true">
      <!-- credential checker script -->
      <script>
          function checkCreds() {
              var usernames = ["miles", "karsey", "param", "mateo"]
              var passwords = ["miles1", "karsey1", "param1", "mateo1"]

              var username = document.getElementById("adminForm").elements["usernameinput"];
              var password = document.getElementById("adminForm").elements["passwordinput"];

              var i;
              var correct = false;
              for(i = 0, i < usernames; i++){
                  if(username == usernames[i] && password == passwords[i]){
                      correct = true;
                  }
                  else {
                      correct = false;
                  }
              }
              if(correct){
                  window.location.href = "http://stackoverflow.com";
              } else {
                  alert("Login incorrect!");
              }

          }
      </script>

    <!-- Header -->
    <header class="masthead d-flex">
      <div class="container text-center my-auto">
        <h1 class="mb-1 big">Admins Only</h1>
        <h2>If you got here and you're not an Admin<br>good job hacking</h2>
      </div>
      <div class="overlay"></div>
      <img src="img/dogLogo.png" class="dogimage" alt="doggo">
    </header>

    <!-- About -->
    <section class="content-section bg-light" id="about">
  <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
              <form onsubmit="checkCreds()" id="adminForm">
                <fieldset>
                <!-- Form Name -->
                <legend>Admin Login</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Username</label>
                    <div class="col-md-4">
                        <input id="textinput" name="usernameinput" type="text" placeholder="username" class="form-control input-md">
                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="passwordinput">Password</label>
                    <div class="col-md-4">
                        <input id="passwordinput" name="passwordinput" type="password" placeholder="password" class="form-control input-md">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="submitButton"></label>
                  <div class="col-md-4">
                    <input href="google.com" name="submitButton" class="btn btn-primary" type="submit" value="Submit"></input>
                  </div>
                </div>

                </fieldset>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <p class="text-muted small mb-0">Copyright © Your Website 2018</p>
      </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger py-2 px-3" href="#page-top" style="display: none;">
      <i class="fas fa-angle-up h5"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.min.js"></script>

</body></html>
