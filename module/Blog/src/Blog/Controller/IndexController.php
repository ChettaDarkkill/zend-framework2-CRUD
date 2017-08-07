<?php
/**
 * Created by PhpStorm.
 * User: chetta
 * Date: 8/7/2017 AD
 * Time: 11:13 PM
 */

namespace Blog\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }
}