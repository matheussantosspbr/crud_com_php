<?php

session_start();
session_destroy();
header('Location: https://crud-php-dev-matheussantos.herokuapp.com/');
exit();
