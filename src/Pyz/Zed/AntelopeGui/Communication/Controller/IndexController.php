<?php

namespace Pyz\Zed\AntelopeGui\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * @method \Pyz\Zed\AntelopeGui\Communication\AntelopeGuiCommunicationFactory getFactory()
 */
class IndexController extends AbstractController
{
    public function indexAction()
    {
        // TODO-1: Get an instance of the AntelopeTable by using the `getFactory()`-method
        $table = null;

        // TODO-2: Use the `viewResponse()`-method to return a rendered 'antelopeTable'
        // Hint-1: Use 'antelopeTable' as key for the passed array
        // Hint-2: The class AbstractTable provides a method `render()`
    }

    public function tableAction()
    {
        // TODO-3: Get an instance of the AntelopeTable by using the `getFactory()`-method
        $table = null;

        // TODO-4: Return a json-response with the table data
        // Hint-1: The class AbstractTable provides a method `fetchData()`
    }
}
