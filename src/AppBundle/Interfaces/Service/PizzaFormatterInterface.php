<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 14:28
 */

namespace AppBundle\Interfaces\Service;


use AppBundle\ValueObject\Pizza;

interface PizzaFormatterInterface
{
    /**
     * @param int|null $id
     * @return Pizza[]
     */
    public function formatPizzas(int $id = null): array;
}