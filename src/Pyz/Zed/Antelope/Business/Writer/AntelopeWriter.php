<?php

namespace Pyz\Zed\Antelope\Business\Writer;

use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Persistence\AntelopeEntityManagerInterface;

/**
 *
 */
class AntelopeWriter
{

    /**
     * @param AntelopeEntityManagerInterface $antelopeEntityManager
     */
    public function __construct(protected AntelopeEntityManagerInterface $antelopeEntityManager)
    {
    }

    /**
     * @param AntelopeTransfer $antelopeTransfer
     *
     * @return AntelopeTransfer
     */
    public function create(AntelopeTransfer $antelopeTransfer): AntelopeTransfer
    {
        return $this->antelopeEntityManager->createAntelope($antelopeTransfer);
    }
}
