<?php

namespace Pyz\Zed\AntelopeSearch\Business;

use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Pyz\Zed\AntelopeSearch\AntelopeSearchDependencyProvider;
use Pyz\Zed\AntelopeSearch\Business\Writer\AntelopeSearchWriter;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method  \Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchRepositoryInterface  getRepository()
 * @method  \Pyz\Zed\AntelopeSearch\Persistence\AntelopeSearchEntityManagerInterface  getEntityManager()
 */
class AntelopeSearchBusinessFactory extends AbstractBusinessFactory
{
    public function createAntelopeSearchWriter(): AntelopeSearchWriter
    {
        //TODO 3. Provide all the dependencies to the AntelopeSearchWriter constructor
        // Hint 1. getRepository(),  available in this  factory class, returns the Repository
        // from the Persistence layer
        // Hint 2. getEntityManager(),  available in this  factory class, returns the EntityManager
        // from the Persistence layer
        return new AntelopeSearchWriter();
    }
    //TODO: 1  Create the getEventBehaviorFacade which returns the  EventBehaviorFacade
    // getting it out of the container
    // HINT 1: you can call the getProvidedDependency() method available in this class,and pass the facade constant FACADE_EVENT_BEHAVIOR
    //as the key .
    // HINT 2. The return type should be EventBehaviorFacadeInterface


    // TODO: 2. Create the getAntelopeFacade method here
    // HINT.  use the getProvidedDependency() method and provide the key you used in the AntelopeSearchDependencyProvider class: FACADE_ANTELOPE
    public function getAntelopeFacade(): AntelopeFacadeInterface
    {
        return $this->getProvidedDependency(AntelopeSearchDependencyProvider::FACADE_ANTELOPE);
    }
}
