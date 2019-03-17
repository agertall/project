<?php
function __autoload($className)
{
    $directorys = array(
        MODEL_DIR,
        CONTROLLERS_DIR
    );

    foreach ($directorys as $directory) {
        $path = $directory . $className . '.php';
        if (file_exists($path)) {
            require_once($path);
            return true;
        }
    }

    return false;
}