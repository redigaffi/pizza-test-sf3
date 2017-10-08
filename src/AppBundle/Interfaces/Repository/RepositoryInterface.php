<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 16:39
 */

namespace AppBundle\Interfaces\Repository;


interface RepositoryInterface
{
    public function save($entity);
}