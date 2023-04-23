<?php

namespace Pyz\Zed\AntelopeDataImport\Business\DataImportStep;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Orm\Zed\Antelope\Persistence\PyzAntelope;
use Pyz\Shared\AntelopeSearch\AntelopeSearchConfig;
use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Pyz\Zed\AntelopeDataImport\Business\DataSet\AntelopeDataSetInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\PublishAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

/**
 *
 */
class AntelopeWriterStep extends PublishAwareStep implements DataImportStepInterface
{
    /**
     * @param AntelopeFacadeInterface $antelopeFacade
     */
    public function __construct(protected AntelopeFacadeInterface $antelopeFacade)
    {
    }

    /**
     * @param DataSetInterface $dataSet
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function execute(DataSetInterface $dataSet): void
    {
        $antelopeCriteriaTransfer = new AntelopeCriteriaTransfer();
        $name = $dataSet[AntelopeDataSetInterface::COLUMN_NAME];
        $color = $dataSet[AntelopeDataSetInterface::COLUMN_COLOR];
        $antelopeCriteriaTransfer->setName($name);

        $antelopeTransfer = $this->antelopeFacade->findOneAntelope($antelopeCriteriaTransfer);
        $antelopeEntity = new PyzAntelope();

        if ($antelopeTransfer) {
            $antelopeEntity = $antelopeEntity->fromArray($antelopeTransfer->toArray());
            $antelopeEntity->setNew(false);
        }
        $antelopeEntity->setName($name);
        $antelopeEntity->setColor($color);

        if ($antelopeEntity->isNew() || $antelopeEntity->isModified()) {
            $antelopeEntity->save();
            $this->addPublishEvents(AntelopeSearchConfig::ANTELOPE_PUBLISH, $antelopeEntity->getIdAntelope());
        }
    }
}
