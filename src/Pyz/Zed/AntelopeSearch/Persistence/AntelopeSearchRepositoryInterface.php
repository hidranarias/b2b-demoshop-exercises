<?php

namespace Pyz\Zed\AntelopeSearch\Persistence;

use Generated\Shared\Transfer\AntelopeSearchCriteriaTransfer;

interface AntelopeSearchRepositoryInterface
{

    public function getAntelopeSearches(AntelopeSearchCriteriaTransfer $antelopeSearchCriteriaTransfer): array;
}
