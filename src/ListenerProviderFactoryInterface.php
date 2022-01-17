<?php

namespace Micro\Component\EventEmitter;

interface ListenerProviderFactoryInterface
{
    /**
     * @return ListenerProviderInterface
     */
    public function create(): ListenerProviderInterface;
}
