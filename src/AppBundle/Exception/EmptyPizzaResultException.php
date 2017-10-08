<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 14:53
 */

namespace AppBundle\Exception;


class EmptyPizzaResultException extends Exception
{

    protected $code = -1;
    protected $message = 'There are no available pizzas.';

}