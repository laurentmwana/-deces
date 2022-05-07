<?php

use App\Cores\App;
use App\Modules\AdminModule;
use App\Modules\CategorieModule;
use App\Renderer\Renderer;
use App\Modules\DefaultsModule;
use App\Modules\postModule;

require "../vendor/autoload.php";

define("SOURCES", dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR . "assets"  . DIRECTORY_SEPARATOR);

$renderer = new Renderer(dirname(__DIR__) . "@views@");

$app = new App([
    DefaultsModule::class,
    PostModule::class,
    CategorieModule::class,
    AdminModule::class
], 
[
    "renderer" => $renderer
]);

$app->run();