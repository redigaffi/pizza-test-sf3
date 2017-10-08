<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 14:21
 */

namespace AppBundle\Service\Formatter;


use AppBundle\Entity\Ingredient;
use AppBundle\Entity\Pizza;
use AppBundle\Exception\EmptyPizzaResultException;
use AppBundle\Interfaces\Repository\PizzaRepositoryInterface;
use AppBundle\Interfaces\Service\PizzaFormatterInterface;


class PizzaFormatterService implements PizzaFormatterInterface
{
    private $pizzaRepository;

    /**
     * PizzaFormatterService constructor.
     * @param PizzaRepositoryInterface $pizzaRepository
     */
    public function __construct(PizzaRepositoryInterface $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
    }

    public function formatPizzas(int $id = null): array
    {
        $result = [];

        if (null !== $id) {
            $pizzas = [$this->pizzaRepository->find($id)];
        } else {
            $pizzas = $this->pizzaRepository->findAll();
        }

        if (empty($pizzas)) {
            throw new EmptyPizzaResultException();
        }

        /**
         * @var Pizza $pizza
         */
        foreach ($pizzas as $pizza) {
            $ingredients = [];

            /**
             * @var Ingredient $ingredient
             */
            foreach ($pizza->getIngredients() as $ingredient) {
                $ingredientFormatted = new \AppBundle\ValueObject\Ingredient($ingredient->getId(),
                                                                             $ingredient->getName(),
                                                                             $ingredient->getCost());
                $ingredients[] = $ingredientFormatted;
            }

            $pizzaFormatted = new \AppBundle\ValueObject\Pizza($pizza->getId(),
                                                               $pizza->getName(),
                                                               $pizza->getCost(),
                                                               $ingredients);
            $result[] = $pizzaFormatted;
        }

        return $result;
    }

}