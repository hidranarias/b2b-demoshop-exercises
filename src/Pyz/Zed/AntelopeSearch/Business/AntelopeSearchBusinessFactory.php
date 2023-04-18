<?php

namespace Pyz\Zed\AntelopeSearch\Business;

use Pyz\Zed\AntelopeSearch\AntelopeSearchDependencyProvider;
use Pyz\Zed\AntelopeSearch\Business\Writer\AntelopeSearchWriter;
use Spryker\Zed\EventBehavior\Business\EventBehaviorFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class AntelopeSearchBusinessFactory extends AbstractBusinessFactory
{
    public function createAntelopeSearchWriter()
    {
        // TODO-1: Inject any additional dependencies required by AntelopeSearchWriter
        return new AntelopeSearchWriter(
           null
        );
    }

    // TODO-2: Create the getEventBehaviorFacade method here
    // HINT.  use the getProvidedDependency method and provide the you used in the dependencyProvider class
}
