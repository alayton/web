<?php
namespace Tonis\Mvc\Subscriber;

use Tonis\Event\EventManager;
use Tonis\Event\SubscriberInterface;
use Tonis\Mvc\Package\PackageInterface;
use Tonis\Mvc\TonisConsole;

final class ConsoleSubscriber implements SubscriberInterface
{
    /** @var TonisConsole */
    private $console;

    /**
     * @param TonisConsole $console
     */
    public function __construct(TonisConsole $console)
    {
        $this->console = $console;
    }

    /**
     * {@inheritDoc}
     */
    public function subscribe(EventManager $events)
    {
        $events->on('bootstrap', function () {
            foreach ($this->console->getTonis()->getPackageManager()->getPackages() as $package) {
                if ($package instanceof PackageInterface) {
                    $package->bootstrapConsole($this->console);
                }
            }
        });
    }
}
