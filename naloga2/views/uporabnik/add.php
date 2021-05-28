<?php if($error) { ?>
<div class="alert alert-danger" role="alert">
  <?php echo $error; ?>
</div>
<?php } ?>
<form method="POST" action="?controller=uporabnik&action=add">
    <div class="form-group">
        <label for="username">Up. ime</label>
        <input name="username" type="text" class="form-control" id="username" placeholder="Up. ime" value="" />
    </div>
    <div class="form-group">
        <label for="password">Geslo</label>
        <input name="password" type="password" class="form-control" id="password" value="" />
    </div>
    <div class="form-group">
        <label for="password_repeat">Ponovitev gesla</label>
        <input name="password_repeat" type="password" class="form-control" id="password_repeat" value="" />
    </div>
    <div class="form-group">
        <label for="address">Naslov</label>
        <input name="address" type="text" class="form-control" id="address" placeholder="Naslov" value="" />
    </div>
    <div class="form-group">
        <label for="post">Pošta</label>
        <input name="post" type="text" class="form-control" id="post" placeholder="Pošta" value="" />
    </div>
    <div class="form-group">
        <label>Gender</label>
        <div class="custom-control custom-radio">
            <input type="radio" id="female" name="gender" class="custom-control-input" value="female"  >
            <label class="custom-control-label" for="female">Ženski</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="male" name="gender" class="custom-control-input" value="male" >
            <label class="custom-control-label" for="male">Moški</label>
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="" />
    </div>
    <div class="form-group">
        <label for="phone">Tel. št.</label>
        <input name="phone" type="text" class="form-control" id="phone" placeholder="Tel. št." value="" />
    </div>

    <button type="submit" class="btn btn-primary">Dodaj</button>
</form>