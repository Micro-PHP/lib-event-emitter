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
     * @return iterable<EventListenerInterface>
     */
    public function getEventListeners(): iterable;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function __toString(): string;
}
