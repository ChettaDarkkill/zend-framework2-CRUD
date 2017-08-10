<?php
/**
 * Created by PhpStorm.
 * User: chetta
 * Date: 8/10/2017 AD
 * Time: 12:05 PM
 */

namespace Blog\Repository;


use Blog\Entity\Post;

class PostRepositoryImpl implements PostRepository
{
    /**
     * @var \Zend\Db\Adapter\Adapter $dbAdapter
     */
    protected $dbAdapter;

    public function save(Post $post)
    {
        $sql = new \Zend\Db\Sql\Sql($this->dbAdapter);
        $insert = $sql->insert()
            ->values(array(
                'title' => $post->getTitle(),
                'slug' => $post->getSlug(),
                'content' => $post->getContent(),
                'category_id' => $post->getCategory(),
                'created' => time(),
            ))
            ->into('post');
        $statement = $sql->prepareStatementForSqlObject($insert);
        $statement->execute();
    }

    /**
     * @return \Zend\Db\Adapter\Adapter
     */
    public function getDbAdapter()
    {
        return $this->dbAdapter;
    }

    /**
     * @param \Zend\Db\Adapter\Adapter $dbAdapter
     */
    public function setDbAdapter($dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

}