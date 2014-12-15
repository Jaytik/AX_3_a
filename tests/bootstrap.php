<?php

/** @var Composer\Autoload\ClassLoader $classLoader */
$classLoader = include __DIR__ . '/../vendor/autoload.php';
$classLoader->addPsr4('Tests\\', __DIR__);
