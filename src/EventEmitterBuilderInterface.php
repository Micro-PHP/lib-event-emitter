<?php

namespace Micro\Component\EventEmitter;

interface EventEmitterBuilderInterface
{
    /**
     * @param ListenerProviderInterface $provider
     * @return void
     */
    public function addProvider(ListenerProviderInterface $provider): void;

    /**
     * @return EventEmitterInterface
     */
    public function build(): EventEmitterInterface;
}
