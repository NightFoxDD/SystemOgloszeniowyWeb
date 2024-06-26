<div class="container d-flex justify-content-center align-items-center ">
  <div class="panel panel-default ">
    <div class="panel-heading">
      <h3 class="panel-title">Zaloguj się</h3>
    </div>
    <div class="panel-body">
      <form method="post" action="<?php echo ROOT_URL ?>users/authenticate">
        <div class="form-group">
          <label>Login</label>
          <input type="text" required min="1" max="20" name="login" class="form-control" />
        </div>
        <div class="form-group">
          <label>Hasło</label>
          <input type="password" required min="1" max="20" name="password" class="form-control" />
        </div>
        <input class="btn btn-primary mt-2 mb-2" name="submit" type="submit" value="Zaloguj się" />
      </form>
    </div>
  </div>
</div>
