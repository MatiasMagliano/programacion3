<?php

  // BASE DE DATOS
  define('NOMBRE_SERVIDOR', 'localhost');
  define('NOMBRE_USUARIO', 'prog_iii');
  define('CONTRASENIA', 'wmWKBn6q');
  define('NOMBRE_BASE', 'programacion3');

  // MISCELANEO
  define('MAX_LOGIN_ATTEMPTS_PER_HOUR', 5);
  define('MAX_EMAIL_VERIFICATION_REQUESTS_PER_DAY', 3);
  define('MAX_PASSWORD_RESET_REQUESTS_PER_DAY', 3);
  define('PASSWORD_RESET_REQUEST_EXPIRY_TIME', 60 * 60);
  define('CSRF_TOKEN_SECRET', 'ogh3Mai3quu');

  // CÓDIGO QUE CORRE EN TODAS LAS PÁGINAS
  date_default_timezone_set('UTC');
  error_reporting(0);
  session_set_cookie_params(['samesite' => 'Strict']);
  session_start();