<?php

namespace Micro\Component\EventEmitter;

use Micro\Component\EventEmitter\Impl\Emitter\EventEmitter;


class EventEmitterFactory implements EventEmitterFactoryInterface
{
    /**
     * @param EventEmitterInterface[] $listenerProviderCollection
     */
    public function __construct(private array $listenerProviderCollection)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function create(): EventEmitterInterface
    {
        return new EventEmitter($this->listenerProviderCollection);
    }
}
