<?php

namespace Pyz\Zed\Antelope\Business\Reader;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Persistence\AntelopeRepositoryInterface;

/**
 *
 */
class AntelopeReader implements AntelopeReaderInterface
{


    public function __construct(protected AntelopeRepositoryInterface $antelopeRepository)
    {
    }

    /**
     * @param AntelopeCriteriaTransfer $antelopeCriteriaTransfer
     * @return AntelopeCriteriaTransfer|null
     */
    public function findOneAntelope(AntelopeCriteriaTransfer $antelopeCriteriaTransfer): ?AntelopeTransfer
    {
        $idAntelope = $antelopeCriteriaTransfer->getIdAntelope();
        if ($idAntelope) {
            $antelopeTransfer = $this->antelopeRepository->findAntelopeById($idAntelope);
        } else {
            $antelopeTransfer = $this->antelopeRepository->findAntelopeByName($antelopeCriteriaTransfer->getName());
        }
        return $antelopeTransfer;
    }

    /**
     * @param array $ids <int>
     * @return array<AntelopeCriteriaTransfer>
     */
    public function findAntelopesByIds(array $ids): array
    {
        return $this->antelopeRepository->findAntelopesByIds($ids);
    }


}
