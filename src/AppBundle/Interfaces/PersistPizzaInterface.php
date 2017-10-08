<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 16:18
 */

namespace AppBundle\Interfaces;


use AppBundle\ValueObject\Pizza;
use AppBundle\ValueObject\PizzaInsertResult;
use AppBundle\ValueObject\RemoveIngredientFromPizzaAction;

interface PersistPizzaInterface
{
    /**
     * @param Pizza[] $data
     * @return PizzaInsertResult
     */
    public function persistPizzas(array $data): PizzaInsertResult;

    /**
     * @param RemoveIngredientFromPizzaAction[] $removeIngredientFromPizzaAction
     * @return mixed
     */
    public function removeIngredientsFromPizza(array $removeIngredientFromPizzaAction);
}