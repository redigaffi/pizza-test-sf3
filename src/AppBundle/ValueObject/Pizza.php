<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 14:38
 */

namespace AppBundle\ValueObject;


class Pizza implements \JsonSerializable
{
    private $id;
    private $name;
    private $cost;
    private $ingredients;

    /**
     * Pizza constructor.
     * @param $id
     * @param $name
     * @param $cost
     * @param Ingredient[] $ingredients
     */
    public function __construct($id = null, $name, $cost = null, $ingredients)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cost = $cost;
        $this->ingredients = $ingredients;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @return Ingredient[]
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cost' => $this->cost,
            'ingredients' => $this->ingredients
        ];
    }


}