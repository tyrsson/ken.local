<?php

declare(strict_types=1);

namespace Event;

use Axleus\Debug\Debug;
use Laminas\EventManager\AbstractListenerAggregate;
use Laminas\EventManager\EventInterface;
use Laminas\EventManager\EventManagerInterface;

final class SomeListener extends AbstractListenerAggregate
{

    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach('someEvent', [$this, 'onSomeEvent'], $priority);
    }

    public function onSomeEvent(EventInterface $event)
    {
        Debug::dump($this, self::class);
    }
}
