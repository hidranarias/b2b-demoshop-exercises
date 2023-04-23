<?php

namespace Pyz\Zed\AntelopeDataImport;

use Spryker\Zed\DataImport\DataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AntelopeDataImportDependencyProvider extends DataImportDependencyProvider
{
    public const FACADE_ANTELOPE = 'FACADE_ANTELOPE';

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        return $this->addAntelopeFacade($container);
    }

    public function addAntelopeFacade(Container $container): Container
    {
        $container->set(self::FACADE_ANTELOPE, function (Container $container) {
            return $container->getLocator()->antelope()->facade();
        });
        return $container;
    }
}
