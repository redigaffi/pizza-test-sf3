<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 14:17
 */

namespace AppBundle\Controller;


use AppBundle\Interfaces\PersistPizzaInterface;
use AppBundle\Interfaces\Service\PizzaFormatterInterface;
use AppBundle\Interfaces\Service\PizzaParserInterface;
use AppBundle\Service\Formatter\PizzaFormatterService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PizzaController extends Controller
{

    private $pizzaFormatterService;
    private $pizzaParserService;
    private $persistPizzaService;

    /**
     * PizzaController constructor.
     * @param PizzaFormatterInterface $pizzaFormatterService
     * @param PizzaParserInterface $pizzaParserService
     * @param PersistPizzaInterface $persistPizzaService
     */
    public function __construct(PizzaFormatterInterface $pizzaFormatterService, PizzaParserInterface $pizzaParserService, PersistPizzaInterface $persistPizzaService)
    {
        $this->pizzaFormatterService = $pizzaFormatterService;
        $this->pizzaParserService = $pizzaParserService;
        $this->persistPizzaService = $persistPizzaService;
    }

    public function listPizzasAction(Request $request, int $id = null)
    {
        $pizzas = $this->pizzaFormatterService->formatPizzas($id);
        return new JsonResponse($pizzas);
    }

    public function newPizzaAction(Request $request)
    {
        $parsedPizzaRequest = $this->pizzaParserService->parseNewPizzasFromJson($request->getContent());
        $result = $this->persistPizzaService->persistPizzas($parsedPizzaRequest);
        return new JsonResponse($result);
    }

    public function editPizzaAction(Request $request, int $id)
    {
        $parsedPizzaRequest = $this->pizzaParserService->parseEditPizzasFromJson($request->getContent(), $id);
        $result = $this->persistPizzaService->removeIngredientsFromPizza($parsedPizzaRequest);
        return new JsonResponse($result);
    }

}