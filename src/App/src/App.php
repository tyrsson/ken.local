<?php

declare(strict_types=1);

namespace App;

use Event\SomeListener;
use Laminas\EventManager\EventManager;

final class App
{
    public function __construct(
        private EventManager $eventManager
    ) {
    }

    public function run()
    {
        $this->eventManager->trigger('someEvent', $this);
    }
}
