<?php
/**
 * Created by PhpStorm.
 * User: chetta
 * Date: 8/10/2017 AD
 * Time: 12:05 PM
 */

namespace Blog\Repository;


use Blog\Entity\Hydrator\CategoryHydrator;
use Blog\Entity\Hydrator\PostHydrator;
use Blog\Entity\Post;
use Zend\Db\Adapter\AdapterAwareTrait;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\Aggregate\AggregateHydrator;

class PostRepositoryImpl implements PostRepository
{

    use AdapterAwareTrait;

    public function save(Post $post)
    {
        $sql = new \Zend\Db\Sql\Sql($this->adapter);
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
     * @return Post[]
     */
    public function fetch($page)
    {
        $sql = new \Zend\Db\Sql\Sql($this->adapter);
        $select = $sql->select();
        $select->columns(array(
            'id',
            'title',
            'slug',
            'content',
            'created',
        ))
        ->from(array('p' => 'post'))
            ->join(
                array('c' => 'category'), //table name
                'c.id = p.category_id', //condition
                array('category_id' => 'id' , 'name', 'category_slug' => 'slug') //column
            )
            ->order('p.id DESC');


        $hydrator = new AggregateHydrator();

        $hydrator->add(new PostHydrator());
        $hydrator->add(new CategoryHydrator());

        $resultSet = new HydratingResultSet($hydrator, new Post());
        $paginatorAdapter = new \Zend\Paginator\Adapter\DbSelect($select, $this->adapter, $resultSet);
        $paginator = new \Zend\Paginator\Paginator($paginatorAdapter);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage(5);

        return $paginator;


    }


}