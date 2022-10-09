<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/base/style.css" />
  <link rel="stylesheet" href="assets/style/cadastro.css" />
  <title>Cadastro</title>
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
  <h1>Faça seu Cadastro</h1>
  <form action="assets/script/php/index.php" method="POST" id="cadastro">
    <label><strong>Nome de Usuário:</strong></label>
    <input type="text" name="username" minlength="5" id="username" maxlength="32" required />
    <label><strong>Senha:</strong></label>
    <input type="password" name="password" minlength="8" id="password" maxlength="20" required />
    <label><strong>Confirme sua Senha:</strong></label>
    <input type="password" name="confPassword" minlength="8" id="confPassword" maxlength="20" required />
    <div>
      <input type="submit" name="submitCad" value="Cadastrar" id="loading" />
      <a href="index.php">Faça seu Login</a>
    </div>
  </form>
  <div class="loading">
    <div class="spinner-box">
      <div class="circle-border">
        <div class="circle-core"></div>
      </div>
    </div>
  </div>
  <script src="assets/script/js/loadingCad.js"></script>
</body>

</html>