<?php

use LINE\Core\Dependency;
use LINE\Core\Route;
use LINE\Core\Setting;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

$setting = Setting::getSetting();

$app = new \Slim\App($setting);
(new Route())->register($app);
(new Dependency())->register($app);
$app->run();