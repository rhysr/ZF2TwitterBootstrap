<?php
include __DIR__ . '/../autoload_register.php';
include __DIR__ . '/../vendor/autoload.php';

set_include_path(implode(PATH_SEPARATOR, array(
    __DIR__,
    get_include_path(),
)));

spl_autoload_register(function($class) {
    $file = str_replace(array('\\', '_'), DIRECTORY_SEPARATOR, $class) . '.php';
    if (false === ($realpath = stream_resolve_include_path($file))) {
        return false;
    }
    include_once $realpath;
});
