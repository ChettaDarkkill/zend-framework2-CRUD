<?php
/**
 * Created by PhpStorm.
 * User: chetta
 * Date: 8/7/2017 AD
 * Time: 11:13 PM
 */

namespace Blog\Controller;


use Blog\Entity\Post;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Form\Add;
use Blog\InputFilter\AddPost;

class IndexController extends AbstractActionController
{
    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        $variables = array();
        /**
         * @var \Blog\Service\BlogService $blogService
         */
        $blogService = $this->getServiceLocator()->get('Blog\Service\BlogService');
        $variables['posts'] = $blogService->fetchAll();

        return new ViewModel($variables);
    }

    public function addAction()
    {
        $form = new Add();
        $valiables = array('form' => $form);

        if($this->request->isPost()) {
            $blogPost = new Post();
            $form->bind($blogPost);

            $form->setInputFilter(new AddPost());
            $form->setData($this->request->getPost());

            if($form->isValid()){
                /**
                 * @var |Blog|Service|BlogService $blogService
                 */
                $blogService = $this->getServiceLocator()->get('Blog\Service\BlogService');
                $blogService->save($blogPost);
                $valiables['success'] = true;

            }
        }
        return new ViewModel($valiables);
    }
}