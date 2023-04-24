<?php

namespace Pyz\Zed\AntelopeSearch;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AntelopeSearchDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_EVENT_BEHAVIOR = 'FACADE_EVENT_BEHAVIOR';
    public const FACADE_ANTELOPE = 'FACADE_ANTELOPE';

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        //TODO: 2  call  the addEventBehaviorFacade() and addAntelopeFacade() methods.
        return $container;
    }
    //TODO: 1  Create the addEventBehaviorFacade method and add it to the container
    // HINT: you can call the $container set method, pass the class constant FACADE_EVENT_BEHAVIOR
    //as key and the closure as a second parameter.
    //HINT 2: you can call the getLocator() method, concatenate name of the facade and then facade() method


    //TODO: 2  Create the addAntelopeFacade method and add it to the container
    // HINT: you can call the $container set method, pass the class constant FACADE_ANTELOPE
    //as key and the closure as a second parameter.
    //HINT 2: you can call the getLocator() method, concatenate name of the facade and then facade() method
    // Example:  return $container->getLocator()->myfacade()->facade();

    public function addAntelopeFacade(Container $container): Container
    {
        $container->set(self::FACADE_ANTELOPE, function (Container $container) {
            return $container->getLocator()->antelope()->facade();
        });
        return $container;
    }


}
