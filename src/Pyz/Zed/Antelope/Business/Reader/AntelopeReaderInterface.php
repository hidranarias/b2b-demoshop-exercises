<?php

namespace Pyz\Zed\Antelope\Business\Reader;


use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;

/**
 *
 */
interface AntelopeReaderInterface
{
    /**
     * @param AntelopeCriteriaTransfer $antelopeCriteriaTransfer
     * @return AntelopeCriteriaTransfer|null
     */
    public function findOneAntelope(AntelopeCriteriaTransfer $antelopeCriteriaTransfer): ?AntelopeTransfer;

    /**
     * @param array $ids <int>
     * @return AntelopeTransfer[]
     */
    public function findAntelopesByIds(array $ids): array;
}
