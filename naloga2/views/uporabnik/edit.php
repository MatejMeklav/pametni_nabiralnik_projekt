<form method="POST" action="?controller=uporabnik&action=edit&user_id=<?php echo $uporabnik->id; ?>">
    <input type="hidden" name="id" value="<?php echo $uporabnik->id; ?>" />
    <div class="form-group">
        <label for="username">Up. ime</label>
        <input name="username" type="text" class="form-control" id="username" placeholder="Up. ime" value="<?php echo $uporabnik->username; ?>" />
    </div>
    <div class="form-group">
        <label for="address">Naslov</label>
        <input name="address" type="text" class="form-control" id="address" placeholder="Naslov" value="<?php echo $uporabnik->address; ?>" />
    </div>
    <div class="form-group">
        <label for="post">Pošta</label>
        <input name="post" type="text" class="form-control" id="post" placeholder="Pošta" value="<?php echo $uporabnik->post; ?>" />
    </div>
    <div class="form-group">
        <label>Gender</label>
        <div class="custom-control custom-radio">
            <input type="radio" id="female" name="gender" class="custom-control-input" value="female" <?php if($uporabnik->gender == 'female') echo 'checked="checked"' ?> >
            <label class="custom-control-label" for="female">Ženski</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="male" name="gender" class="custom-control-input" value="male"  <?php if($uporabnik->gender == 'male') echo 'checked="checked"' ?> >
            <label class="custom-control-label" for="male">Moški</label>
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="<?php echo $uporabnik->email; ?>" />
    </div>
    <div class="form-group">
        <label for="phone">Tel. št.</label>
        <input name="phone" type="text" class="form-control" id="phone" placeholder="Tel. št." value="<?php echo $uporabnik->phone; ?>" />
    </div>

    <button type="submit" class="btn btn-primary">Uredi</button>
</form>