<?php

namespace Pyz\Zed\Antelope\Persistence;

use Generated\Shared\Transfer\AntelopeTransfer;
use Orm\Zed\Antelope\Persistence\PyzAntelope;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method AntelopePersistenceFactory getFactory()
 */
class AntelopeRepository extends AbstractRepository implements AntelopeRepositoryInterface
{
    /**
     * @param int $idAntelope
     * @return PyzAntelope|null
     */
    public function findAntelopeById(int $idAntelope): ?AntelopeTransfer
    {
        $antelopeEntity = $this->getFactory()
            ->createAntelopeQuery()
            ->findOneByIdAntelope($idAntelope);
        if(!$antelopeEntity){
            return null;
        }
        return $this->getFactory()->createAntelopeMapper()->mapAntelopeEntityToAntelopeTransfer(
            $antelopeEntity,
          new AntelopeTransfer());
    }

    /**
     * @param string $name
     * @return AntelopeTransfer|null
     */
    public function findAntelopeByName(string $name): ?AntelopeTransfer
    {
        $antelopeEntity =  $this->getFactory()
            ->createAntelopeQuery()
            ->findOneByName($name);
          if(!$antelopeEntity){
              return null;
          }
        return $this->getFactory()->createAntelopeMapper()->mapAntelopeEntityToAntelopeTransfer(
            $antelopeEntity,
            new AntelopeTransfer());
    }

    /**
     * @param array $ids<int>
     * @return array<AntelopeTransfer>
     */
    public function findAntelopesByIds(array $ids): array
    {
        $antelopeEntities = $this->getFactory()
            ->createAntelopeQuery()
            ->filterByIdAntelope_In($ids)
            ->find();
        $antelopeTransfers = [];
        $mapper = $this->getFactory()->createAntelopeMapper();
        foreach ($antelopeEntities as $antelopeEntity) {
            $antelopeTransfers[] = $mapper->mapAntelopeEntityToAntelopeTransfer($antelopeEntity, new AntelopeTransfer());
        }

        return $antelopeTransfers;
    }
}
