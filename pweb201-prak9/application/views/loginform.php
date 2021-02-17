<div class="container">
  <h4 class="black-text">Member Login</h4>

  <form action="loginauth" method="post">
    <div class="row">
      <div class="col m6 s12">
        <div id="msg">
          <?php
          if ($stat == 1) {
            echo "Username atau Password salah!";
          }
           ?>
        </div>
        <div class="input-field">
          <label for="username">Username</label>
          <input id="username" type="text" name="username" class="validate" required>
        </div>
        <div class="input-field">
          <label for="password">Password</label>
          <input id="password" type="password" name="password" class="validate" required>
        </div>

        <input class="btn" type="submit" name="" value="Login">
      </div>
    </div>
  </form>
</div>
