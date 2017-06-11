<?php

use LINE\Core\Dependency;
use LINE\Core\Route;
use LINE\Core\Setting;

require_once __DIR__ . '/../vendor/autoload.php';

$setting = Setting::getSetting();

var_dump($setting);

die(1);

$app = new \Slim\App($setting);
(new Route())->register($app);
(new Dependency())->register($app);
$app->run();