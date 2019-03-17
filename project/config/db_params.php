<?php
return array(
    'host' => 'localhost',
    'dbname' => 'prog',
    'user' => 'root',
    'password' => '',
);

define(ROOT_DIR, dirname(__FILE__) . "/");
define(MODEL_DIR, CLASSES_DIR . "model/");
define(CONTROLLERS_DIR, CLASSES_DIR . "controllers/");
define(COMPONENTS_DIR, ROOT_DIR . "components/");

require_once(ROOT_DIR . "/functions.php");

spl_autoload_register("__autoload");
?>