<?php

namespace Micro\Component\EventEmitter;

use Micro\Component\EventEmitter\Impl\Emitter\EventEmitter;

class EventEmitterFactory implements EventEmitterFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function create(): EventEmitterInterface
    {
        return new EventEmitter();
    }
}
