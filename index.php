<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/base/style.css" />
  <link rel="stylesheet" href="assets/style/index.css" />
  <title>Pagina Ingicial</title>
</head>

<body>
  <?php
  if (isset($_GET['msgErro'])) {
  ?>
    <div class="alertErro">
      <p><?php print_r($_GET['msgErro']); ?></p>
    </div>
  <?php
  }
  ?>
  <?php
  if (isset($_GET['msgSucesso'])) {
  ?>
    <div class="alertSucesso">
      <p><?php print_r($_GET['msgSucesso']); ?></p>
    </div>
  <?php
  }
  ?>
  <h1>Faça seu Login</h1>
  <form action="" method="post">
    <label><strong>Nome de Usuário:</strong></label>
    <input type="text" name="username" required />
    <label><strong>Senha:</strong></label>
    <input type="password" name="password" minlength="8" required />
    <div>
      <input type="submit" name="submit" value="Logar" />
      <a href="cadastro.php">Faça seu Cadastro</a>
    </div>
  </form>
</body>

</html>