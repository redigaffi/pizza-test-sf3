<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 17:57
 */

namespace Tests\AppBundle\Service;

use AppBundle\Service\PizzaPriceCalculatorService;
use PHPUnit\Framework\TestCase;

class PizzaPriceCalculatorServiceTest extends TestCase
{
    /**
     * @dataProvider data
     */
    public function testPizzaPriceIsCorrectlyCalculated($ingredientCost, $expectedResult)
    {
        $pizzaPriceCalculator = new PizzaPriceCalculatorService(1.50);
        $result = $pizzaPriceCalculator->calculatePizzaPriceByIngredients($ingredientCost);
        $this->assertEquals($expectedResult, $result);
    }

    public function data()
    {
        return [
            [50, 75],
            [100, 150],
            [200, 300]
        ];
    }
}
