<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 16:17
 */

namespace AppBundle\Service;


use AppBundle\Interfaces\PersistPizzaInterface;
use AppBundle\Interfaces\Repository\IngredientRepositoryInterface;
use AppBundle\Interfaces\Repository\PizzaRepositoryInterface;
use AppBundle\ValueObject\Ingredient;
use AppBundle\ValueObject\Pizza;
use AppBundle\ValueObject\PizzaInsertResult;
use AppBundle\ValueObject\PizzaRemoveIngredientsResult;
use AppBundle\ValueObject\RemoveIngredientFromPizzaAction;

class PersistPizzaService implements PersistPizzaInterface
{

    private $pizzaRepository;
    private $ingredientRepository;
    private $pizzaPriceCalculatorService;

    /**
     * PersistPizzaService constructor.
     * @param PizzaRepositoryInterface $pizzaRepository
     * @param IngredientRepositoryInterface $ingredientRepository
     * @param \AppBundle\Interfaces\PizzaPriceCalculatorService $pizzaPriceCalculatorService
     */
    public function __construct(PizzaRepositoryInterface $pizzaRepository, IngredientRepositoryInterface $ingredientRepository, \AppBundle\Interfaces\PizzaPriceCalculatorService $pizzaPriceCalculatorService)
    {
        $this->pizzaRepository = $pizzaRepository;
        $this->ingredientRepository = $ingredientRepository;
        $this->pizzaPriceCalculatorService = $pizzaPriceCalculatorService;
    }


    public function persistPizzas(array $data): PizzaInsertResult
    {
        $result = [];

        /**
         * @var Pizza $pizza
         */
        foreach ($data as $pizza) {
            $pizzaEntity = new \AppBundle\Entity\Pizza();
            $pizzaEntity->setName($pizza->getName());

            $totalIngredientPrice = 0;
            /**
             * @var Ingredient $ingredient
             */
            foreach ($pizza->getIngredients() as $ingredient) {
                $ingredientEntity = $this->ingredientRepository->find($ingredient->getId());
                $totalIngredientPrice += $ingredientEntity->getCost();
                $pizzaEntity->addIngredient($ingredientEntity);
            }

            $pizzaPrice = $this->pizzaPriceCalculatorService->calculatePizzaPriceByIngredients($totalIngredientPrice);
            $pizzaEntity->setCost($pizzaPrice);
            $this->pizzaRepository->save($pizzaEntity);
            $result[] = $pizzaEntity->getId();
        }

        return new PizzaInsertResult($result);
    }

    public function removeIngredientsFromPizza(array $removeIngredientFromPizzaAction)
    {
        $result = [];
        /**
         * @var RemoveIngredientFromPizzaAction $toRemove
         */
        foreach ($removeIngredientFromPizzaAction as $toRemove) {
            $pizzaId = $toRemove->getPizzaId();

            /**
             * @var \AppBundle\Entity\Pizza $pizzaEntity
             */
            $pizzaEntity = $this->pizzaRepository->find($pizzaId);
            $pizzaIngredients = $pizzaEntity->getIngredients();

            $ingredientsRemoved = 0;

            /**
             * @var \AppBundle\Entity\Ingredient $pizzaIngredient
             */
            foreach($pizzaIngredients as $pizzaIngredient) {
                if (in_array($pizzaIngredient->getId(), $toRemove->getIngredientsToRemove())) {
                    $pizzaEntity->removeIngredient($pizzaIngredient);
                    $ingredientsRemoved++;
                }
            }

            $this->pizzaRepository->save($pizzaEntity);
            $result[]  = new PizzaRemoveIngredientsResult($ingredientsRemoved);
        }

        return $result;
    }


}