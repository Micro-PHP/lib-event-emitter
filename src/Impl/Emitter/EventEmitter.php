<?php

namespace Micro\Component\EventEmitter\Impl\Emitter;

use Micro\Component\EventEmitter\EventEmitterInterface;
use Micro\Component\EventEmitter\EventInterface;
use Micro\Component\EventEmitter\EventListenerInterface;
use Micro\Component\EventEmitter\ListenerProviderInterface;


class EventEmitter implements EventEmitterInterface
{
    /**
     * @param ListenerProviderInterface[] $listenerProviderStorage
     */
    public function __construct(private array $listenerProviderStorage)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function emit(EventInterface $event): void
    {
        foreach ($this->listenerProviderStorage as $provider) {
            $this->provideEventToEventProvider($provider, $event);
        }
    }

    /**
     * @param ListenerProviderInterface $provider
     * @param EventInterface $event
     * @return void
     */
    private function provideEventToEventProvider(ListenerProviderInterface $provider, EventInterface $event): void
    {
        foreach ($provider->getListenersForEvent($event) as $listener) {
            $this->provideEventToListener($listener, $event);
        }
    }

    /**
     * @param EventListenerInterface $listener
     * @param EventInterface $event
     * @return void
     */
    private function provideEventToListener(EventListenerInterface $listener, EventInterface $event): void
    {
        $listener->on($event);
    }
}
