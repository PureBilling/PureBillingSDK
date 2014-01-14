<?php

require_once(__DIR__.'/vendor/autoload.php');

//Register annotations
Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
        'Symfony',
        __DIR__.'/vendor/symfony/symfony/src'
        );
Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
        'PureBilling\Bundle\SDKBundle',
        __DIR__.'/src'
        );
Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
        'PureMachine\Bundle\SDKBundle',
        __DIR__.'/vendor/puremachine/sdk/src'
        );