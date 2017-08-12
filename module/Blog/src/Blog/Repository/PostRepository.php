<?php
/**
 * Created by PhpStorm.
 * User: chetta
 * Date: 8/10/2017 AD
 * Time: 12:04 PM
 */

namespace Blog\Repository;

use Application\Repository\RepositoryInterface;
use Blog\Entity\Post;

interface PostRepository extends RepositoryInterface
{
    /**
     *
     * Saves a blog post
     *
     * @param Post $post
     *
     * @return void
     */
    public function save(Post $post);

    /**
     * @param $page int
     *
     * @return \Zend\Paginator\Paginator
     */
    public  function fetch($page);

}