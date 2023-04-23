<?php

namespace Pyz\Zed\Antelope\Business;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;

/**
 *
 */
interface AntelopeFacadeInterface
{
    /**
     * Specification:
     * - Creates a new antelope into the database
     *
     * @param AntelopeTransfer $antelopeTransfer
     *
     * @return AntelopeTransfer
     * @api
     *
     */
    public function createAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer;

    /**
     * @param AntelopeCriteriaTransfer $antelopeCriteriaTransfer
     * @return AntelopeTransfer|null
     */
    public function findOneAntelope(AntelopeCriteriaTransfer $antelopeCriteriaTransfer): ?AntelopeTransfer;

    /**
     * @param AntelopeCriteriaTransfer $antelopeCriteriaTransfer
     * @return AntelopeTransfer[]
     */
    public function findAntelopesByIds(AntelopeCriteriaTransfer $antelopeCriteriaTransfer): array;
}
