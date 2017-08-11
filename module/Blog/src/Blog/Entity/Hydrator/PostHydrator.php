<?php
/**
 * Created by PhpStorm.
 * User: chetta
 * Date: 8/10/2017 AD
 * Time: 2:56 PM
 */

namespace Blog\Entity\Hydrator;


use Zend\Stdlib\Hydrator\HydratorInterface;
use Blog\Entity\Post;

class PostHydrator implements HydratorInterface
{

    public function extract($object)
    {
        if(!$object instanceof Post){
            return array();
        }

        return array(
            'id' => $object->getId(),
            'title' => $object->getTitle(),
            'slug' => $object->getSlug(),
            'content' => $object->getContent(),
        );
    }

    /**
     * @param array $data
     * @param object $object
     * @return object
     */
    public function hydrate(array $data, $object)
    {
        if(!$object instanceof Post) {
            return $object;
        }

        $object->setId(isset($data['id']) ? intval($data['id']) : null);
        $object->setTitle(isset($data['title']) ? $data['title'] : null);
        $object->setSlug(isset($data['slug']) ? $data['slug'] : null);
        $object->setContent(isset($data['content']) ? $data['content'] : null);

        return $object;
    }
}