<?php

namespace Pyz\Zed\Antelope\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\AntelopeTransfer;
use Orm\Zed\Antelope\Persistence\PyzAntelope;

/**
 *
 */
class AntelopeMapper
{

    /**
     * @param AntelopeTransfer $antelopeTransfer
     * @param PyzAntelope $antelopeEntity
     * @return PyzAntelope
     */
    public function mapAntelopeTransferToAntelopeEntity(
        AntelopeTransfer $antelopeTransfer,
        PyzAntelope $antelopeEntity
    ): PyzAntelope {
        return $antelopeEntity->fromArray($antelopeTransfer->modifiedToArray());
    }


    /**
     * @param PyzAntelope $antelopeEntity
     * @param AntelopeTransfer $antelopeTransfer
     * @return AntelopeTransfer
     */
    public function mapAntelopeEntityToAntelopeTransfer(
        PyzAntelope $antelopeEntity,
        AntelopeTransfer $antelopeTransfer
    ): AntelopeTransfer {
        return $antelopeTransfer->fromArray($antelopeEntity->toArray(), true);
    }


}
