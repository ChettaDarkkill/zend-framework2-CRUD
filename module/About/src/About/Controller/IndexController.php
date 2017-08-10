<?php
/**
 * Created by PhpStorm.
 * User: chetta
 * Date: 8/9/2017 AD
 * Time: 1:10 PM
 */

namespace About\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}