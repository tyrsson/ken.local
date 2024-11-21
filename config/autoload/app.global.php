<?php

declare(strict_types=1);

use App\App;
use Event\SomeListener;
use Laminas\EventManager\EventManager;
use Laminas\EventManager\SharedEventManager;
use Psr\Container\ContainerInterface;

return [
    'debug' => false,
    'dependencies' => [
        'aliases'    => [],
        'factories'  => [
            EventManager::class => function(ContainerInterface $container) {
                $em = new EventManager(new SharedEventManager());
                $listener = $container->get(SomeListener::class);
                $listener->attach($em);
                return $em;
            },
            App::class => function(ContainerInterface $container) {
                return new App($container->get(EventManager::class));
            },
        ],
        'invokables' => [
            SomeListener::class => SomeListener::class
        ],
    ],
];