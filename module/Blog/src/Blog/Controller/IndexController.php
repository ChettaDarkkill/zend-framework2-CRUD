<?php

namespace Blog\Controller;

use Blog\Entity\Post;
use Blog\Form\Add;
use Blog\InputFilter\AddPost;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $variables = array();

        /**
         * @var \Blog\Service\BlogService $blogService
         */
        $blogService = @$this->getServiceLocator()->get('Blog\Service\BlogService');
        $variables['paginator'] = $blogService->fetch($this->params()->fromRoute('page'));
        return new ViewModel($variables);
    }

    public function addAction()
    {
        $form = new Add();
        $variables = array('form' => $form);

        if ($this->request->isPost()) {
            $blogPost = new Post();
            $form->bind($blogPost);
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                /**
                 * @var \Blog\Service\BlogService $blogService
                 */
                $blogService = @$this->getServiceLocator()->get('Blog\Service\BlogService');
                $blogService->save($blogPost);
                $variables['success'] = true;
            }
        }

        return new ViewModel($variables);
    }
} 