<?php

namespace Micro\Component\EventEmitter;


class EventEmitterBuilder implements EventEmitterBuilderInterface
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
    public function addProvider(ListenerProviderInterface $provider): void
    {
        $this->listenerProviderStorage[] = $provider;
    }

    /**
     * {@inheritDoc}
     */
    public function build(): EventEmitterInterface
    {
        return $this->createEventEmitterFactory()->create();
    }

    /**
     * @return EventEmitterFactoryInterface
     */
    private function createEventEmitterFactory(): EventEmitterFactoryInterface
    {
        return new EventEmitterFactory($this->listenerProviderStorage);
    }
}
