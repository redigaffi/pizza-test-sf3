<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 15:27
 */

namespace AppBundle\Interfaces\Service;


use AppBundle\ValueObject\Pizza;
use AppBundle\ValueObject\RemoveIngredientFromPizzaAction;

interface PizzaParserInterface
{
    /**
     * Parse new pizzas from JSON.
     * @param string $json
     * @return Pizza[]
     */
    public function parseNewPizzasFromJson(string $json): array;

    /**
     * Parse edited pizzas from JSON
     * @param string $json
     * @param int $id
     * @return RemoveIngredientFromPizzaAction[]
     */
    public function parseEditPizzasFromJson(string $json, int $id): array;
}