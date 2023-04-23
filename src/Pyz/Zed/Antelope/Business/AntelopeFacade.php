<?php

namespace Pyz\Zed\Antelope\Business;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\Antelope\Business\AntelopeBusinessFactory getFactory()
 * @method \Pyz\Zed\Antelope\Persistence\AntelopeEntityManagerInterface getEntityManager()
 */
class AntelopeFacade extends AbstractFacade implements AntelopeFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @param AntelopeTransfer $antelopeTransfer
     *
     * @return AntelopeTransfer
     * @api
     *
     */
    public function createAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer
    {
        return $this->getFactory()
            ->createAntelopeWriter()
            ->create($antelopeTransfer);
    }

    /**
     * @param AntelopeCriteriaTransfer $antelopeCriteriaTransfer
     *
     * @return AntelopeCriteriaTransfer|null
     */
    public function findOneAntelope(AntelopeCriteriaTransfer $antelopeCriteriaTransfer): ?AntelopeTransfer
    {
        return $this->getFactory()
            ->createAntelopeReader()
            ->findOneAntelope($antelopeCriteriaTransfer);
    }

    /**
     * @param array $ids<int>
     *
     * @return AntelopeCriteriaTransfer[]
     */
    public function findAntelopesByIds(AntelopeCriteriaTransfer $antelopeCriteriaTransfer): array
    {
        return $this->getFactory()
            ->createAntelopeReader()
            ->findAntelopesByIds($antelopeCriteriaTransfer->getIdsAntelope());
    }
}
