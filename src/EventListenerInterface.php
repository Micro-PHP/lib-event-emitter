<?php

namespace Micro\Component\EventEmitter;

interface EventListenerInterface
{
    /**
     * @param  EventInterface $event
     * @return void
     */
    public function on(EventInterface $event): void;

    /**
     * @param  EventInterface $event
     * @return bool
     */
    public static function supports(EventInterface $event): bool;
}
