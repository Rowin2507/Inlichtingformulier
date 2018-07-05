
<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#000">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="apple-mobile-web-app-title" content="Rowin Schmidt">
    <meta name="author" content="Rowin Schmidt">
    <meta name="description" content="Inlichtingformulier invullen als voorbereiding van je vervolg opledinging op het Mediacollege Amsterdam." />
    <title>Inlichtingformulier - Rowin Schmidt</title>
    <link rel="shortcut icon" type="image/jpg" sizes="50x50" href="assets/images/icon.jpg">
    <link rel="stylesheet" href="assets/stylesheets/grid.css">
    <link rel="stylesheet" href="assets/stylesheets/main.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
  </head>
<body>
  <div class="main-bg">
    <div class="main-blurred">
      <div class="main-content">
        <form method="post" action="model/form-data.php" id="inlichtingformulier-form">
          <?php
            include 'views/fieldset-1.html';
            include 'views/fieldset-2.html';
            include 'views/fieldset-3.html';
            include 'views/fieldset-4.html';
            include 'views/fieldset-5.html';
          ?>
        </form>
        <div class="formulier-afgerond">
          <span class="blok-titel">Formulier afgerond</span>
          <p><img src="assets/images/afgerond-icon.svg" alt="PDF-icon" /></p>
          <p>Het formulier is volledig ingevuld.</p>
          <div class="buttons-afgerond">
            <button class="button-afgerond wit" title="Voorbeeld bekijken van PDF"><i class="fas fa-file-pdf"></i>&nbsp; Voorbeeld bekijken</button>
            <button class="button-afgerond roze" onclick="return xepOnline.Formatter.Format('PDF-document');" title="Downloaden als PDF">
              <i class="fas fa-download"></i><span class="xs-visible">&nbsp; Downloaden als PDF</span>
            </button>
          </div>
          <span class="formulier-afgerond-terug">Formuliergegevens wijzigen.</span>
        </div>
      </div>
    </div>
    <div class="main-indicatie">
      <span class="main-indicatie-getal" id="indicatie1">1</span>
      <span class="main-indicatie-getal" id="indicatie2">2</span>
      <span class="main-indicatie-getal" id="indicatie3">3</span>
      <span class="main-indicatie-getal" id="indicatie4">4</span>
      <span class="main-indicatie-lijn">
        <span class="main-indicatie-lijn-voortgang">Alleen uw gegevens nog.</span>
      </span>
    </div>

    <div class="pdf-voorbeeld-overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-8 offset-sm-2">
          <div class="pdf-voorbeeld-overlay-content">
            <!-- PDF content komt hier -->
          </div>
        </div>
        <div class="col-xs-12 col-sm-1">
          <div class="pdf-voorbeeld-overlay-buttons">
            <span class="pdf-voorbeeld-overlay-button pdf-overlay-sluiten">✕</span>
            <span onclick="return xepOnline.Formatter.Format('PDF-document');" class="pdf-voorbeeld-overlay-button pdf-overlay-downloaden"><i class="fas fa-download"></i></span>
          </div>
        </div>
      </div>
    </div>

    <div id="copyright"></div>
  </div>

<script src="assets/scripts/xepOnline.jqPlugin.js"></script>
<script src="assets/scripts/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcv3zP2Thj7Uf1psZF-PUig4AZ66xAeGA&libraries=places&callback=initAutocomplete" async defer></script>
</body>
</html>
