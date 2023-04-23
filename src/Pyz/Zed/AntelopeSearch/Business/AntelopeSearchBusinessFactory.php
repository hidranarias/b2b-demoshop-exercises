<?php

namespace Pyz\Zed\AntelopeSearch\Business;

use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Pyz\Zed\AntelopeSearch\AntelopeSearchDependencyProvider;
use Pyz\Zed\AntelopeSearch\Business\Writer\AntelopeSearchWriter;
use Spryker\Zed\EventBehavior\Business\EventBehaviorFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method  \Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchRepositoryInterface  getRepository()
 * @method  \Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchEntityManagerInterface  getEntityManager()
 */
class AntelopeSearchBusinessFactory extends AbstractBusinessFactory
{
    public function createAntelopeSearchWriter(): AntelopeSearchWriter
    {
        return new AntelopeSearchWriter(
            $this->getEventBehaviorFacade(),
            $this->getRepository(),
            $this->getEntityManager(),
            $this->getAntelopeFacade(),


        );
    }

    public function getEventBehaviorFacade(): EventBehaviorFacadeInterface
    {
        return $this->getProvidedDependency(AntelopeSearchDependencyProvider::FACADE_EVENT_BEHAVIOR);
    }

    public function getAntelopeFacade(): AntelopeFacadeInterface
    {
        return $this->getProvidedDependency(AntelopeSearchDependencyProvider::FACADE_ANTELOPE);
    }
}
