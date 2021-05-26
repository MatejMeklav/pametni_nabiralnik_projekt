<div class="form-group">
    <h2>Prijava</h2>
    <form action="?controller=uporabniki&action=prijava_shrani" method="POST">
        <label>Uporabnisko ime</label><input class="form-control" type="text" name="username" /> <br/>
        <label>Geslo</label><input class="form-control" type="password" name="password" /> <br/>
        <input class="btn btn-primary" id="prijava" type="submit" name="poslji" value="Prijava" /> <br/>
    </form>
</div>