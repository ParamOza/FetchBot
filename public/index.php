<html lang="en" class="gr__blackrockdigital_github_io"><link type="text/css" id="dark-mode" rel="stylesheet" href=""><style type="text/css" id="dark-mode-custom-style"></style><head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Mateo Silver, Karsey Renfert, Param Oza, Miles Boswell">

    <title>Home - FetchBot.Dog</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
<!--
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
    <meta name="theme-color" content="#ffffff"> -->

    <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
    <link href="/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/stylish-portfolio.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=.85">

  </head>

  <body id="page-top" data-gr-c-s-loaded="true" cz-shortcut-listen="true" class="m-0">

    <!-- Navigation -->
    <?php echo file_get_contents(getcwd()."/pagefillins/menu.html"); ?>

    <!-- Header -->
    <header class="masthead d-flex">
      <div class="container text-center my-auto">
        <h1 class="mb-1 big">Ask Me Anything</h1>
        <h3 class="mb-5">
            <form id="testquestionform">
                <div class="form-group">
                    <input type="question" class="form-control form-control-lg w-75 mx-auto my-3" id="questionOutput" placeholder="Ask a question.">
                    <button type="submit" class="btn btn-xl btn-primary">Search</button>
                </div>
            </form>
        </h3>


      </div>
      <div class="overlay">
          <img src="/img/dogLogo.png" class="dogImage">
      </div>
    </header>

    <!-- About -->
    <section class="content-section bg-light bg-doggie" id="about">
      <div class="container text-center">
        <div class="row p-2">
          <div class="col-lg-10 mx-auto">
            <h2>FetchBot is a custom search engine that answers all your questions.</h2>
            <p class="lead mb-5 font-weight-bold">Created By:<a href="https://github.com/Mateo-S/"> Mateo Silver, <a href="https://github.com/bm20894"> Miles Boswell,<a href="https://github.com/karseyr"> Karsey Renfert,<a href="https://github.com/ParamOza/"> and Param Oza</a></a></a></a>!</p>

          </div>
        </div>
      </div>
    </section>










    <!-- Call to Action -->
    <section class="content-section bg-primary text-white">
      <div class="container text-center">
        <h2 class="mb-4">Choose a plan:</h2>
        <a href="reg.php?plan=pp" class="btn btn-xl btn-light mr-4">Prepaid</a>
        <a href="reg.php?plan=sub" class="btn btn-xl btn-dark">Annual Subscription</a>
      </div>
    </section>




    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <ul class="list-inline mb-5">
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3 p-2" href="https://www.facebook.com/MadHacksUW/">
              <i class="icon-social-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3 p-2" href="https://twitter.com/MadHacksUW">
              <i class="icon-social-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white p-2" href="https://github.com/ParamOza/MHS-MadHacks2018">
              <i class="icon-social-github"></i>
            </a>
          </li>
        </ul>
        <p class="text-muted small mb-0">Copyright © Fetchbot.dog 2018</p>
      </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger py-2 px-3" href="#page-top" style="display: none;">
      <i class="fas fa-angle-up h5"></i>
    </a>


    <div class="modal fade" id="displaymod" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
          <div class="modal-header">
            <h5 class="modal-title display-4 mx-auto" id="exampleModalLabel">We have an answer:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
              <i class="fas fa-quote-left hidertq"></i>
              <span id="showans"></span>
              <i class="fas fa-quote-right hidertq"></i>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn-lg btn-secondary mx-auto" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/js/stylish-portfolio.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#testquestionform").submit(function(event) {
                $(".hidertq").hide();
                $(".modal-footer").hide();
                
                $("#showans").text("⌛ This won't take long...");
                $("#displaymod").modal();

                var xhttp = new XMLHttpRequest();
                var req = $("#questionOutput").val();
                xhttp.open("GET", "/respond.php?q="+req, true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == this.DONE) {
                      //console.log(xhttp.responseText);
                      $(".hidertq").show();
                      $(".modal-footer").show();

                      $("#showans").text(xhttp.responseText);
                      $("#displaymod").modal();
                    }
                }
                event.preventDefault();
            });
        });
    </script>

</body></html>
