<?php

namespace Pyz\Zed\AntelopeSearch;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AntelopeSearchDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_EVENT_BEHAVIOR = 'FACADE_EVENT_BEHAVIOR';

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        //TODO: Create the addEventBehaviorFacade method and add it to the container
        // HINT: you can call the $container set method, pass the class constant FACADE_EVENT_BEHAVIOR
        //as key and the closure as a second parameter.
        //HINT 2: you can call the getLocator() method, concatenate name of the facade and then facade() method


        return $container;
    }

    // Implement the addEventBehaviorFacade method here
}
