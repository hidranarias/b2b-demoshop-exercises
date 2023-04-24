<?php

namespace Pyz\Zed\AntelopeSearch\Business\Writer;


use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeSearchTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Generated\Shared\Transfer\EventEntityTransfer;
use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchEntityManagerInterface;
use Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchRepositoryInterface;
use Spryker\Zed\EventBehavior\Business\EventBehaviorFacadeInterface;

/**
 * @method
 */
class AntelopeSearchWriter
{

    /**
     * @param EventBehaviorFacadeInterface $eventBehaviorFacade
     * @param AntelopeFacadeInterface $antelopeFacade
     * @param AntelopeSearchRepositoryInterface $antelopeSearchRepository
     * @param AntelopeSearchEntityManagerInterface $antelopeSearchEntityManager
     */
    public function __construct(
        protected EventBehaviorFacadeInterface $eventBehaviorFacade,
        protected AntelopeFacadeInterface $antelopeFacade,
        protected AntelopeSearchRepositoryInterface $antelopeSearchRepository,
        protected AntelopeSearchEntityManagerInterface $antelopeSearchEntityManager,

    ) {
    }

    /**
     * @param EventEntityTransfer[] $eventTransfers
     * @return void
     */
    public function writeCollectionByAntelopeEvents(array $eventTransfers): void
    {
        $antelopeIds = $this->eventBehaviorFacade->getEventTransferIds($eventTransfers);

        $this->writeCollectionByAntelopeIds($antelopeIds);
    }

    /**
     * @param int[] $antelopeIds
     *
     * @return void
     */
    protected function writeCollectionByAntelopeIds(array $antelopeIds): void
    {
        if (!$antelopeIds) {
            return;
        }


        $antelopeTransfersIndexed = $this->getAntelopeTransfersIndexed($antelopeIds);
        $antelopeSearchTransfersIndexed = $this->getAntelopeSearchTransfersIndexed(
            array_keys($antelopeTransfersIndexed)
        );

        foreach ($antelopeTransfersIndexed as $antelopeId => $antelopeTransfer) {
            $searchData = $antelopeTransfer->toArray();

            $antelopeSearchTransfer = $antelopeSearchTransfersIndexed[$antelopeId] ?? new AntelopeSearchTransfer();

            $antelopeSearchTransfer
                ->setFkAntelope($antelopeId)
                ->setData($searchData);

            if ($antelopeSearchTransfer->getIdAntelopeSearch() === null) {
                $this->antelopeSearchEntityManager->createAntelopeSearch($antelopeSearchTransfer);

                continue;
            }

            $this->antelopeSearchEntityManager->updateAntelopeSearch($antelopeSearchTransfer);
        }
    }

    /**
     * @param int[] $antelopeIds
     *
     * @return AntelopeTransfer[]
     */
    protected function getAntelopeTransfersIndexed(array $antelopeIds): array
    {
        //TODO 3. Create an instance of AntelopeCriteriaTransfer and populate it the
        // $antelopeIds
        $antelopeSearchCriteriaTransfer = null;

        $antelopeCriteriaTransfer = (new AntelopeCriteriaTransfer())
            ->setIdsAntelope($antelopeIds);
//TODO 2. Use the antelopeFacade instance to get antelopes by id
        // HINT. You have to pass it the previously created DTO
        $antelopeTransfers = $this->antelopeFacade
            ->findAntelopesByIds($antelopeCriteriaTransfer);

        $antelopeTransfersIndexed = [];
        foreach ($antelopeTransfers as $antelopeTransfer) {
            $antelopeTransfersIndexed[$antelopeTransfer->getIdAntelope()] = $antelopeTransfer;
        }

        return $antelopeTransfersIndexed;
    }

    /**
     * @param int[] $antelopeIds
     *
     * @return AntelopeSearchTransfer[]
     */
    protected function getAntelopeSearchTransfersIndexed(array $antelopeIds): array
    {
        //TODO 1. Create an instance of AntelopeSearchCriteriaTransfer and populate it the
        // $antelopeIds
        $antelopeSearchCriteriaTransfer = null;
//TODO 2. Use the antelopeSearchRepository instance to get antelopesearches data
        // HINT. You have to pass it the previously created DTO
        $antelopeSearchTransfers = null;

        $antelopeSearchTransfersIndexed = [];
        foreach ($antelopeSearchTransfers as $antelopeSearchTransfer) {
            $antelopeSearchTransfersIndexed[$antelopeSearchTransfer->getFkAntelope()] = $antelopeSearchTransfer;
        }

        return $antelopeSearchTransfersIndexed;
    }
}
