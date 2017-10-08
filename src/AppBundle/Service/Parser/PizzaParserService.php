<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 15:26
 */

namespace AppBundle\Service\Parser;


use AppBundle\Interfaces\Service\PizzaParserInterface;
use AppBundle\ValueObject\Ingredient;
use AppBundle\ValueObject\Pizza;
use AppBundle\ValueObject\RemoveIngredientFromPizzaAction;

class PizzaParserService implements PizzaParserInterface
{
    public function parseNewPizzasFromJson(string $json): array
    {
        $jsonDecoded = json_decode($json, true);

        $pizzas = [];
        foreach ($jsonDecoded as $pizza) {

            $ingredients = [];
            foreach ($pizza['ingredients'] as $ingredient) {
                $ingredients[] = new Ingredient($ingredient);
            }

            $pizzas[] = new Pizza(null, (string)$pizza['name'], null, $ingredients);
        }

        return $pizzas;
    }

    public function parseEditPizzasFromJson(string $json, int $id): array
    {
        $jsonDecoded = json_decode($json, true);
        $result = [];

        foreach($jsonDecoded as $removeIngredientAction) {
            $result[] = new RemoveIngredientFromPizzaAction($id, $removeIngredientAction['remove_ingredients']);
        }

        return $result;
    }


}