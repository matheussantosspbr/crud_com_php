
<?php
// se não existe uma sessão chamada 'usuario' será redirecionada para a pagina de login
if (!$_SESSION['Username']) {
  header('Location: https://crud-php-dev-matheussantos.herokuapp.com/index.php?msgErro=Faça seu Login');
  exit();
}
