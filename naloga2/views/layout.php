<DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <!-- dodamo viewport in kodo za dodajanje bootstrap knjižnice -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   <!-- NIMA AJAXA - SLIM <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <!-- dodamo js za ikone iz fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

  <body>
    <!-- naša stran bo imela fiksno responsive širino-->
    <div class="container text-center">

      <!-- ustvarimo navbar meni po bootstrap vzorcu-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <!-- Naslov na meniju -->
        <a class="navbar-brand" href="#">Oglasnik</a>

        <!-- gumb, ki se pojavi, ko se meni zaradi širine zaslona skrije, in omogoča vertikalno razširitev menija -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Vsebina menija -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- levi meni z opcijami za navigacijo -->
          <ul class="navbar-nav mr-auto">

            <!-- primer označevanja aktivnih elementov v meniju, ko je opcija/kontroler izbran -->
            <li style="background-color: #2498ff; margin: 10px" class="nav-item <?php if ($controller != 'oglasi') echo ("active"); ?>">
              <a class="nav-link" href="index.php">Domov </a>
            </li>
            <!-- primer označevanja aktivnih elementov v meniju, ko je opcija/kontroler izbran -->
            <li style="background-color: #2498ff; margin: 10px" class="nav-item <?php if ($controller == 'oglasi') echo ("active"); ?>">
              <a class="nav-link" href="?controller=oglasi&action=index">Oglasi</a>
            </li>
            <li style="background-color: #2498ff; margin: 10px" class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Več možnosti
              </a>
              <!-- primer spustnega menija znotraj menija -->
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="?controller=oglasi&action=dodaj"Nov oglas </a>
                <a class="dropdown-item" href="#">Nekaj drugega</a>
                <div class="dropdown-divider"></div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
          <!-- desni meni z opcijami za prijavo in registracijo in fotnawesome ikonami v znački i -->

          <ul class="navbar-nav ml-auto">
              <?php if (!isset($_SESSION['user_id'])) {?>
            <li style="background-color: #2498ff; margin: 10px" class="nav-item" <?php if ($controller == 'uporabnik') echo ("active");?>><a class="nav-link" href="?controller=uporabnik&action=register"><i class="fas fa-user"></i> Registracija</a></li>
             <?php }?>
            <?php if (isset($_SESSION['user_id'])) {?> 
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin']) {?> 
            <li style="background-color: #2498ff; margin: 10px" class="nav-item" <?php if ($controller == 'uporabnik') echo ("active"); ?>>
              <a class="nav-link" href="?controller=uporabnik&action=list"><i class="fas fa-users"></i> Urejanje uporabnikov</a>
            </li>
            <?php }?>
            <li style="background-color: #2498ff; margin: 10px" class="nav-item"<?php if($controller == 'uporabnik') echo ("active");?>>
              <a class="nav-link" href="?controller=uporabnik&action=logout"><i class="fas fa-sign-in-alt"></i> Odjava</a>
            </li>
            <li style="background-color: #2498ff; margin: 10px" class="nav-item" <?php if ($controller == 'uporabnik') echo ("active"); ?>>
              <a class="nav-link" href="?controller=uporabnik&action=profile"><i class="fas fa-sign-in-alt"></i> Profil</a>
            </li>
            <?php } else {?>
            <li style="background-color: #2498ff; margin: 10px" class="nav-item" <?php if ($controller == 'uporabnik') echo ("active"); ?>>
              <a class="nav-link" href="?controller=uporabnik&action=login"><i class="fas fa-sign-in-alt"></i> Prijava</a>
            </li>
            <?php }?> 

          </ul>
        </div>
      </nav>

      <!-- naredimo mrežo kjer ima sredinski element širino 8, ostala dva pa vzameta preostalo širino  -->

      <div class="row content">
        <div class="col-sm">
          <p><a href="#">Povezava</a></p>
          <p><a href="#">Povezava</a></p>
          <p><a href="#">Povezava</a></p>
        </div>
        <div class="col-sm-12 text-left">

          <!-- tukaj se bo vključevala koda pogledov, ki jih bodo nalagali kontrolerji -->
          <!-- klic akcije iz routes bo na tem mestu zgeneriral html kodo, ki bo zalepnjena v našo predlogo -->
          <?php require_once('routes.php'); ?>



        </div>
        <div class="col-sm">
          <div class="card">
            <p>Reklame</p>
          </div>
          <div class="card">
            <p>Reklame</p>
          </div>
        </div>
      </div>
    </div>

    <footer class="container text-center">
      <p>Moji oglasi - MVC primer</p>
    </footer>

    <body>

  </html>
