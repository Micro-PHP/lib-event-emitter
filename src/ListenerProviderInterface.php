<?php

namespace Micro\Component\EventEmitter;

interface ListenerProviderInterface
{
    /**
     * @param EventInterface $event
     *
     * @return iterable<EventListenerInterface>
     */
    public function getListenersForEvent(EventInterface $event): iterable;

    /**
     * @param EventListenerInterface[] $listeners
     * @return void
     */
    public function registerListeners(array $listeners): void;

    /**
     * @param EventListenerInterface $listener
     * @return void
     */
    public function registerListener(EventListenerInterface $listener): void;
}
