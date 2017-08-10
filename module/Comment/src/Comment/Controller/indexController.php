<?php
/**
 * Created by PhpStorm.
 * User: chetta
 * Date: 8/8/2017 AD
 * Time: 5:33 PM
 */

namespace Comment\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class indexController extends AbstractActionController
{
    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }
}