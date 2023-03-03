<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - eStartup Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eStartup - v4.10.0
  * Template URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div id="logo">
        <h1><a href="index.html"><span>W</span>inefinder</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about-us">About</a></li>
          <li><a class="nav-link scrollto" href="#features">Features</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-left">
          <h2>Search For Wines</h2>
          <form action="wineCards.php" method="post">

            <label for="winery">Choose a Winery: </label>
            <select id="winery" name="winery">
                <option value="ALL">ALL</option>
              <?php
              require_once 'dbconnect.php';
              $sqlStmnt = "select name from winery order  by name";
              try {
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    // execute the sql select statement
                    $q = $pdo->query($sqlStmnt);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                  }
              catch (PDOException $e)
              {
                    die("Error occurred:" . $e->getMessage());
              }
              ?>
              <?php while ($r = $q->fetch()): ?>
                 <option value='<?php echo $r['name'] ?>'><?php echo $r['name'] ?></option>
              <?php endwhile; ?>

              <?php echo "</select>";
            ?>



            <label for="varietal">Choose a Varietal: </label>
            <select id="varietal" name="varietal">
              <option value="ALL">ALL</option>
              <option value="Albarino">Albarino</option>
              <option value="Barbera">Barbera</option>
              <option value="Blend">Blend</option>
              <option value="Cabernet Franc">Cabernet Franc</option>
              <option value="Cabernet Sauvignon">Cabernet Sauvignon</option>
              <option value="Carmenere">Carmenere</option>
              <option value="Charbono">Charbono</option>
              <option value="Chardonnay">Chardonnay</option>
              <option value="Chenin Blanc">Chenin Blanc</option>
              <option value="Cinsault">Cinsault</option>
              <option value="Counoise">Counoise</option>
              <option value="Dolcetto">Dolcetto</option>
              <option value="Gewurztraminer">Gewurztraminer</option>
              <option value="Grenache">Grenache</option>
              <option value="Grenache Blanc">Grenache Blanc</option>
              <option value="Grenache Noir">Grenache Noir</option>
              <option value="Grüner Veltliner">Grüner Veltliner</option>
              <option value="Lemberger">Lemberger</option>
              <option value="Madeleine Angevine">Madeleine Angevine</option>
              <option value="Malbec">Malbec</option>
              <option value="Marsanne">Marsanne</option>
              <option value="Meritage">Meritage</option>
              <option value="Merlot">Merlot</option>
              <option value="Mourvèdre">Mourvèdre</option>
              <option value="Muscat">Muscat</option>
              <option value="Nebbiolo">Nebbiolo</option>
              <option value="Petit Verdot">Petit Verdot</option>
              <option value="Picpoul">Picpoul</option>
              <option value="Pinot Grigio">Pinot Grigio</option>
              <option value="Pinot Gris">Pinot Gris</option>
              <option value="Pinot Meunier">Pinot Meunier</option>
              <option value="Pinot Noir">Pinot Noir</option>
              <option value="Riesling">Riesling</option>
              <option value="Rose">Rose</option>
              <option value="Roussanne">Roussanne</option>
              <option value="Sangiovese">Sangiovese</option>
              <option value="Sauvignon Blanc">Sauvignon Blanc</option>
              <option value="Sémillon">Sémillon</option>
              <option value="Siegerrebe">Siegerrebe</option>
              <option value="Syrah">Syrah</option>
              <option value="Tempranillo">Tempranillo</option>
              <option value="Viognier">Viognier</option>
              <option value="Zinfandel">Zinfandel</option>    </select>
            <label for="area">Choose area: </label>
            <select id="area" name="area">
              <option value="ALL">ALL</option>
              <option value="Walla Walla">Walla Walla</option>
              <option value="Woodinville">Woodinville</option>
            </select>
            <label for="price">Choose price: </label>
            <select id="price" name="price">
              <option value="ALL">ALL</option>
              <option value="< 20">Under $20</option>
              <option value="< 30">Under $30</option>
              <option value="< 40">Under $40</option>
              <option value="< 50">Under $50</option>
              <option value=">= 50">$50 and above</option>
            </select>
            <label for="sortBy">Sort by: </label>
            <select id="sortBy" name="sortBy">
              <option value=" ORDER BY winery.name">Winery</option>
              <option value=" ORDER BY wines.vintage">Vintage</option>
              <option value=" ORDER BY wines.winePrice ASC">Price low to high</option>
              <option value=" ORDER BY wines.winePrice DESC">Price high to low</option>
            </select>

            <input type="submit">
          </form>

        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">
      <div class="container">
        <p>
          Example inner page template

        </p>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-4">
          <div class="footer-logo">

            <a class="navbar-brand" href="#">eStartup</a>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the.</p>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Abou Us</h4>

            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">Features item</a></li>
              <li><a href="#">Live streaming</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Abou Us</h4>

            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">Features item</a></li>
              <li><a href="#">Live streaming</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Support</h4>

            <ul class="list-unstyled">
              <li><a href="#">faq</a></li>
              <li><a href="#">Editor help</a></li>
              <li><a href="#">Contact us</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Abou Us</h4>

            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">Features item</a></li>
              <li><a href="#">Live streaming</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>

          </div>
        </div>

      </div>
    </div>

    <div class="copyrights">
      <div class="container">
        <p>&copy; Copyrights eStartup. All rights reserved.</p>
        <div class="credits">
          <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eStartup
        -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>

  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>