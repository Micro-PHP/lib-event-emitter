<?php

namespace Micro\Component\EventEmitter\Impl\Emitter;

use Micro\Component\EventEmitter\EventEmitterInterface;
use Micro\Component\EventEmitter\EventInterface;
use Micro\Component\EventEmitter\EventListenerInterface;
use Micro\Component\EventEmitter\ListenerProviderInterface;


class EventEmitter implements EventEmitterInterface
{
    /**
     * @var ListenerProviderInterface[]
     */
    private array $listenerProviderStorage;

    public function __construct()
    {
        $this->listenerProviderStorage = [];
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
     * {@inheritDoc}
     */
    public function addListenerProvider(ListenerProviderInterface $listenerProvider): EventEmitterInterface
    {
        $this->listenerProviderStorage[] = $listenerProvider;

        return $this;
    }

    /**
     * @param  ListenerProviderInterface $provider
     * @param  EventInterface            $event
     * @return void
     */
    private function provideEventToEventProvider(ListenerProviderInterface $provider, EventInterface $event): void
    {
        foreach ($provider->getListenersForEvent($event) as $listener) {
            $this->provideEventToListener($listener, $event);
        }
    }

    /**
     * @param  EventListenerInterface $listener
     * @param  EventInterface         $event
     * @return void
     */
    private function provideEventToListener(EventListenerInterface $listener, EventInterface $event): void
    {
        $listener->on($event);
    }
}
