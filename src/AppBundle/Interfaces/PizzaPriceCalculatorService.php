<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 16:52
 */

namespace AppBundle\Interfaces;


interface PizzaPriceCalculatorService
{
    public function calculatePizzaPriceByIngredients(float $ingredientsTotalCost): float;
}