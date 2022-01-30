<?php

namespace Micro\Component\EventEmitter;

interface EventEmitterInterface
{
    /**
     * @param EventInterface $event
     *
     * @return void
     */
    public function emit(EventInterface $event): void;

    /**
     * @return $this
     */
    public function addListenerProvider(ListenerProviderInterface $listenerProvider): self;
}
