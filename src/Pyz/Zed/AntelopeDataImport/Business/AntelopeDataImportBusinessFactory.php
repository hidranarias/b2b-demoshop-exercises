<?php

namespace Pyz\Zed\AntelopeDataImport\Business;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Pyz\Zed\AntelopeDataImport\AntelopeDataImportDependencyProvider;
use Pyz\Zed\AntelopeDataImport\Business\DataImportStep\AntelopeWriterStep;
use Pyz\Zed\AntelopeDataImport\Business\DataImportStep\ColorToLowercaseStep;
use Spryker\Zed\DataImport\Business\DataImportBusinessFactory;
use Spryker\Zed\DataImport\Business\Model\DataImporterInterface;

/**
 *
 */
class AntelopeDataImportBusinessFactory extends DataImportBusinessFactory
{
    /**
     * @param DataImporterConfigurationTransfer|null $dataImporterConfigurationTransfer
     *
     * @return DataImporterInterface
     */
    public function getAntelopeDataImport(?DataImporterConfigurationTransfer $dataImporterConfigurationTransfer = null
    ): DataImporterInterface {
        $dataImporter = $this->getCsvDataImporterFromConfig($dataImporterConfigurationTransfer);

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker();
        $dataSetStepBroker->addStep($this->createColorToLowercaseStep());
        $dataSetStepBroker->addStep($this->createAntelopeWriterStep());

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return ColorToLowercaseStep
     */
    public function createColorToLowercaseStep(): ColorToLowercaseStep
    {
        return new ColorToLowercaseStep();
    }

    /**
     * @return AntelopeWriterStep
     */
    public function createAntelopeWriterStep(): AntelopeWriterStep
    {
        return new AntelopeWriterStep($this->getAntelopeFacade());
    }

    /**
     * @return AntelopeFacadeInterface
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getAntelopeFacade(): AntelopeFacadeInterface
    {
        return $this->getProvidedDependency(AntelopeDataImportDependencyProvider::FACADE_ANTELOPE);
    }
}
