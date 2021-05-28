<style>
  body {
    margin: 0;
    padding: 0;
    height: 100vh;
  }

  #login .container #login-row #login-column #login-box {
    margin-top: 120px;
    max-width: 600px;
    height: 320px;
    border: 1px solid #9C9C9C;
    background-color: #EAEAEA;
  }

  #login .container #login-row #login-column #login-box #login-form {
    padding: 20px;
  }

  #login .container #login-row #login-column #login-box #login-form #register-link {
    margin-top: -85px;
  }
</style>
<div id="login">
  <h3 class="text-center text-black pt-5">Prijava</h3>
  <div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
      <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
          <form id="login-form" class="form" action="?controller=uporabnik&action=login" method="POST">
            <?php if (isset($data['error'])) { ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $data['error']; ?>
              </div>
            <?php } ?>
            <h3 class="text-center text-info">Prijava</h3>
            <div class="form-group">
              <label for="username" class="text-info">Uporabniško ime:</label><br>
              <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="password" class="text-info">Geslo:</label><br>
              <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-info btn-md" value="Prijava">
            </div>
            <div id="register-link" class="text-right">
              <a href="#" class="text-info">Registriraj se tukaj</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>