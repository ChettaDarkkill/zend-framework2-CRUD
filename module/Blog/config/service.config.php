<?php
/**
 * Created by PhpStorm.
 * User: chetta
 * Date: 8/7/2017 AD
 * Time: 11:06 PM
 */
namespace Blog;
return array(

    'factories' => array(
        'Blog\Repository\PostRepository' => function(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
            $postRepository = new \Blog\Repository\PostRepositoryImpl();
            $postRepository->setDbAdapter($serviceLocator->get('Zend\Db\Adapter\Adapter'));

            return $postRepository;
        },
        'Blog\Service\BlogService' => function(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator){
            $blogService = new \Blog\Service\BlogServiceImpl();
            $blogService->setPostRepository($serviceLocator->get('Blog\Repository\PostRepository'));

            return $blogService;
        }
    ),

);