

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../assets/css/login.css">
    <title>Sistema de gestão</title>
  </head>
<body>
<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="post" action="../_scripts/auth.php">
      <input type="text" id="idUser"  name="username" placeholder="username"/>
      <input type="password" id="idPassword" name="password" placeholder="password"/>
      <button type="submit" class="btn btn-primary">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/login.js"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>
    <script>
      tippy('#idUser', {
        content: 'Digite seu usuário',
      });
      tippy('#idPassword', {
        content: 'Digite sua senha',
      });
    </script>
</body>

</html>
