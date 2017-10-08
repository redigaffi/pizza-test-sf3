<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 17:20
 */

namespace AppBundle\ValueObject;


class RemoveIngredientFromPizzaAction
{
    private $pizzaId;
    private $ingredientsToRemove;

    /**
     * RemoveIngredientFromPizzaAction constructor.
     * @param $pizzaId
     * @param $ingredientsToRemove
     */
    public function __construct(int $pizzaId, array $ingredientsToRemove)
    {
        $this->pizzaId = $pizzaId;
        $this->ingredientsToRemove = $ingredientsToRemove;
    }

    /**
     * @return int
     */
    public function getPizzaId(): int
    {
        return $this->pizzaId;
    }

    /**
     * @return array
     */
    public function getIngredientsToRemove(): array
    {
        return $this->ingredientsToRemove;
    }




}