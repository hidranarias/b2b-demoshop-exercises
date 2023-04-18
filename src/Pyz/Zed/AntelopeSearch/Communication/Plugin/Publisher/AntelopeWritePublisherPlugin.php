<?php

namespace Pyz\Zed\AntelopeSearch\Communication\Plugin\Publisher;

use Pyz\Shared\AntelopeSearch\AntelopeSearchConfig;
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
     * @api
     *
     * @param array<\Generated\Shared\Transfer\EventEntityTransfer> $eventEntityTransfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $eventEntityTransfers, $eventName)
    {
        //TODO-2 .  Call the getFacade() method to have access to the module's facade
        // and call writeCollectionByAntelopeEvents and pass the $eventEntityTransfers array

    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string[]
     */
    public function getSubscribedEvents(): array
    {
        // TODO: return an array of events to listen to
        //HINT. Use the AntelopeSearchConfig class to have access to the constants
        // fot publish, create and update events

        return [

        ];
    }
}
