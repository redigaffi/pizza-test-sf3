<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 16:50
 */

namespace AppBundle\Service;


class PizzaPriceCalculatorService implements \AppBundle\Interfaces\PizzaPriceCalculatorService
{

    private $pizzaPreparationPrice;

    /**
     * PizzaPriceCalculatorService constructor.
     * @param $pizzaPreparationPrice
     */
    public function __construct($pizzaPreparationPrice)
    {
        $this->pizzaPreparationPrice = $pizzaPreparationPrice;
    }

    public function calculatePizzaPriceByIngredients(float $ingredientsTotalCost): float
    {
        return $this->pizzaPreparationPrice * $ingredientsTotalCost;
    }
}