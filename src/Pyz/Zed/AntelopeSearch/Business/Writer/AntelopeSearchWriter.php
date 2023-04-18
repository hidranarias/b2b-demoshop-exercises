<?php

namespace Pyz\Zed\AntelopeSearch\Business\Writer;

use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Orm\Zed\AntelopeSearch\Persistence\PyzAntelopeSearchQuery;
use Spryker\Zed\EventBehavior\Business\EventBehaviorFacadeInterface;


class AntelopeSearchWriter
{
    protected EventBehaviorFacadeInterface $eventBehaviorFacade;


    public function __construct(
        EventBehaviorFacadeInterface $eventBehaviorFacade


    ) {
        $this->eventBehaviorFacade = $eventBehaviorFacade;

    }

    public function writeCollectionByAntelopeEvents(array $eventTransfers): void
{
    $antelopeIds = $this->eventBehaviorFacade->getEventTransferIds($eventTransfers);

    $this->writeCollectionByAntelopeIds($antelopeIds);
}

    protected function writeCollectionByAntelopeIds(array $antelopeIds): void
{
    if (!$antelopeIds) {
        return;
    }

    foreach ($antelopeIds as $antelopeId) {
        //TODO-1 Use the pyzAntelopeQuery class to find antelope by id and assign
        // the result to $antelopeEntity
        // HINT: use the appropriate filterBy method and return an entity by using the `findOne()` method
        $antelopeEntity = null;
       // TODO-2  create an instance of PyzAntelopeSearchQuery and assign it to $searchEntity
        $searchEntity = null;
        $searchEntity->filterByFkAntelope($antelopeId)
            ->findOneOrCreate();
            $searchEntity->setFkAntelope($antelopeId);

            $searchData = $antelopeEntity->toArray();
            $searchEntity->setData($searchData);

            $searchEntity->save();

            // Trigger the publish event here
            // TODO [__TRIGGER_PUBLISH_EVENT__];
        }
}
}
