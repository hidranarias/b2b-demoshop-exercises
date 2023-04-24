<?php

namespace Pyz\Zed\AntelopeSearch\Communication\Plugin\Publisher;

use Generated\Shared\Transfer\EventEntityTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PublisherExtension\Dependency\Plugin\PublisherPluginInterface;

/**
 * @method \Pyz\Zed\AntelopeSearch\Business\AntelopeSearchFacadeInterface getFacade()
 */
class AntelopeWritePublisherPlugin extends AbstractPlugin implements PublisherPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @param array<EventEntityTransfer> $eventEntityTransfers
     * @param string $eventName
     *
     * @return void
     * @api
     *
     */
    public function handleBulk(array $eventEntityTransfers, $eventName): void
    {
        // TODO 1. Use the `getFacade()` method of this class to have access to the Module's facade and
        //call its method meant to write the data provided by `$eventEntityTransfers`

    }

    /**
     * {@inheritDoc}
     *
     * @return string[]
     * @api
     *
     */
    public function getSubscribedEvents(): array
    {
        //##### Add to the returned array all of the events we want to listen to:
        //1. publish antelope
        //2. Create antelope
        //3. Update Antelope
        // The strings are found as constants in the `AntelopeSearchConfig` class.
        // For example
        // return ['antelope publish', 'antelope create','antelope update',]
        // Use the appropriate constants from that class

        return [

        ];
    }
}
