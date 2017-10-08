<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 14:39
 */

namespace AppBundle\ValueObject;


class Ingredient implements \JsonSerializable
{
    private $id;
    private $name;
    private $cost;

    /**
     * Ingredient constructor.
     * @param $id
     * @param $name
     * @param $cost
     */
    public function __construct($id = null, $name = null, $cost = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cost = $cost;
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

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cost' => $this->cost
        ];
    }


}