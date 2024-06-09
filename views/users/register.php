<div class="container justify-content-center mb-5 mt-5 align-items-center panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Zarejestruj konto</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php echo ROOT_URL ?>users/createAccount">
      <div class="form-group">
        <label>login</label>
        <input type="text" name="login" required min="1" max="20" class="form-control" />
      </div>
      <div class="form-group">
        <label>Hasło</label>
        <input type="password" name="password" required min="1" max="20" class="form-control" />
      </div>
      <div class="form-group mt-3 mb-3">
        <label>Admin</label>
        <input type="checkbox" name="admin" />
        <label>Firma</label>
        <input type="checkbox" name="firma" />
      </div>
      <input class="btn btn-primary" name="submit" type="submit" value="Zarejestruj się" />
    </form>
  </div>
</div>