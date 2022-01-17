<?php

namespace Micro\Component\EventEmitter\Impl\Provider;

use JetBrains\PhpStorm\Pure;
use Micro\Component\EventEmitter\EventInterface;
use Micro\Component\EventEmitter\EventListenerInterface;
use Micro\Component\EventEmitter\ListenerProviderInterface;


class ListenerProvider implements ListenerProviderInterface
{
    /**
     * @var EventListenerInterface[]
     */
    private array $listenerStorage;

    #[Pure] public function __construct()
    {
        $this->listenerStorage = [];
    }

    /**
     * {@inheritDoc}
     */
    public function registerListener(EventListenerInterface $listener): void
    {
        $this->listenerStorage[] = $listener;
    }

    /**
     * {@inheritDoc}
     */
    public function registerListeners(array $listeners): void
    {
        foreach ($listeners as $listener) {
            $this->registerListener($listener);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getListenersForEvent(EventInterface $event): iterable
    {
        /** @var EventListenerInterface $listener */
        foreach ($this->listenerStorage as $listener) {
            if($listener->supports($event)) {
                yield $listener;
            }
        }
    }
}
