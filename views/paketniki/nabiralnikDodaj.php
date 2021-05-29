<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Dodajte nabiralnik</h4>
            <form method="POST" action="?controller=nabiralnik&action=dodajNabiralnik">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-archive"></i> </span>
                    </div>
                    <input name="ime" class="form-control" placeholder="Ime(ID) nabiralnika" type="text" required>
                </div> <!-- form-group// -->
                <h6 class="card-title mt-3 text-left">Najem od:</h6>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
                    </div>
                    <input name="od" class="form-control" placeholder="Najem od:" type="date" required>
                </div> <!-- form-group// -->
                <h6 class="card-title mt-3 text-left">Najem do:</h6>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
                    </div>
                    <input name="do" class="form-control"  type="date" required>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <input name="id" class="form-control"  type="text" value="<?php echo $_GET['user_id']?>" required hidden>
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" name="poslji" class="btn btn-primary btn-block"> Dodaj nabiralnik  </button>
                </div> <!-- form-group// -->
            </form>
        </article>
    </div> <!-- card.// -->
</div>
<!--container end.//-->
