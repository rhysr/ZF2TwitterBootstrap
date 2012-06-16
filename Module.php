<?php

namespace ZF2TwitterBootstrap;

use Zend\EventManager\EventInterface as Event;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/../../autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }


    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }
}
