<?php

header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('America/Fortaleza');



require __DIR__.'/vendor/autoload.php';

use Core\Enviroment;
Enviroment::load(__DIR__);

require __DIR__.'/functions/variables.php';
require __DIR__.'/functions/redirect.php';

use Core\Routes as Routes;
$url = new Routes();
$url->carregar();
exit;

?>
