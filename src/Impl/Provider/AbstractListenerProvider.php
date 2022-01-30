<?php

namespace Micro\Component\EventEmitter\Impl\Provider;

use Micro\Component\EventEmitter\EventInterface;
use Micro\Component\EventEmitter\EventListenerInterface;
use Micro\Component\EventEmitter\ListenerProviderInterface;


abstract class AbstractListenerProvider implements ListenerProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getListenersForEvent(EventInterface $event): iterable
    {
        /**@var EventListenerInterface $listener */
        foreach ($this->getEventListeners() as $listener) {
            if($listener->supports($event)) {
                yield $listener;
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->getName() ?? get_class($this);
    }
}
