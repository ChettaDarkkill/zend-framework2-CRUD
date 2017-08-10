<?php
/**
 * Created by PhpStorm.
 * User: chetta
 * Date: 8/10/2017 AD
 * Time: 11:42 AM
 */

namespace Blog\Service;
use Blog\Entity\Post;

class BlogServiceImpl implements BlogService
{
    /**
     * @var \Blog\Repository\PostRepositoryImpl $postRepository
     */
    protected $postRepository;
    /**
     * Save a blog post
     *
     * @param Post $post
     *
     * @return mixed
     */
    public function save(Post $post)
    {
        $this->postRepository->save($post);
    }

    /**
     * @return \Blog\Repository\PostRepositoryImpl
     */
    public function getPostRepository()
    {
        return $this->postRepository;
    }

    /**
     * @param \Blog\Repository\PostRepositoryImpl $postRepository
     */
    public function setPostRepository($postRepository)
    {
        $this->postRepository = $postRepository;
    }



}