<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Prijava</h4>
            <form method="POST" action="?controller=uporabnik&action=prijava" >
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="uporabnisko_ime" class="form-control" placeholder="Uporabniško ime" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="geslo" class="form-control" placeholder="Vnesite geslo" type="password">
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" name="poslji"  class="btn btn-primary btn-block"> Prijava  </button>
                </div> <!-- form-group// -->
                <p class="text-center">Še nimate uporabniškega računa? <a href="?controller=uporabnik&action=registracija">Registracija</a> </p>
            </form>
        </article>
    </div> <!-- card.// -->
</div>
<!--container end.//-->