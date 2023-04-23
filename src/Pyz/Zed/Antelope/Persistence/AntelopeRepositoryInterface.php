<?php

namespace Pyz\Zed\Antelope\Persistence;

use Generated\Shared\Transfer\AntelopeTransfer;

/**
 *
 */
interface AntelopeRepositoryInterface
{
    /**
     * @param int $idAntelope
     * @return AntelopeTransfer|null
     */
    public function findAntelopeById(int $idAntelope): ?AntelopeTransfer;

    /**
     * @param string $name
     * @return AntelopeTransfer|null
     */
    public function findAntelopeByName(string $name): ?AntelopeTransfer;

    /**
     * @param array $ids <int>
     * @return AntelopeTransfer[]
     */
    public function findAntelopesByIds(array $ids): array;
}
