
<?php
// se não existe uma sessão chamada 'usuario' será redirecionada para a pagina de login
if (!$_SESSION['Username']) {
  header("Location: http://localhost/crudphp/");
  exit();
}
