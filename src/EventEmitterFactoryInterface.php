<?php

namespace Micro\Component\EventEmitter;

interface EventEmitterFactoryInterface
{
    /**
     * @return EventEmitterInterface
     */
    public function create(): EventEmitterInterface;
}
