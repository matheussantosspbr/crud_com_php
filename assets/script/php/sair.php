<?php

session_start();
session_destroy();
header('Location: http://localhost/crudphp/painel.php');
exit();
