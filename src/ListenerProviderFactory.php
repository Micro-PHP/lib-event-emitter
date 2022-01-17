<?php

namespace Micro\Component\EventEmitter;

use Micro\Component\EventEmitter\Impl\Provider\ListenerProvider;

class ListenerProviderFactory implements ListenerProviderFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function create(): ListenerProviderInterface
    {
        return new ListenerProvider();
    }
}
