<?php
/**
 * Created by PhpStorm.
 * User: chetta
 * Date: 8/10/2017 AD
 * Time: 12:04 PM
 */

namespace Blog\Repository;


use Blog\Entity\Post;

interface PostRepository
{
    public function save(Post $post);
}