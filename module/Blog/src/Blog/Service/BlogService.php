<?php
/**
 * Created by PhpStorm.
 * User: chetta
 * Date: 8/10/2017 AD
 * Time: 11:40 AM
 */

namespace Blog\Service;
use Blog\Entity\Post;

interface BlogService
{
    /**
     * Save a blog post
     *
     * @param Post $post
     *
     * @return mixed
     */
    public function save(Post $post);

    /**
     * @param $page int
     *
     * @return \Zend\Paginator\Paginator
     */
    public function fetch($page);
}