<?php

namespace Pyz\Zed\AntelopeSearch\Business;

use Generated\Shared\Transfer\EventEntityTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\AntelopeSearch\Business\AntelopeSearchBusinessFactory getFactory()
 */
class AntelopeSearchFacade extends AbstractFacade implements AntelopeSearchFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @param EventEntityTransfer[] $eventTransfers
     *
     * @return void
     * @api
     *
     */
    public function writeCollectionByAntelopeEvents(array $eventTransfers): void
    {
        //TODO . Call the getFactory() method available in this class to get an instance
        // of the `AntelopeSearchWriter` . The factory has a method which does exactly that.
        // Call the appropriate method from the `AntelopeSearchWriter` instance to
        // write the data provided inside the `$eventTransfers` `DTO`.
        //EXAMPLE: $this->getFactory()->createMyObject()->callMyMethod($eventTransfers)
      
    }
}
