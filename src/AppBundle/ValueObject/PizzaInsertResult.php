<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 17:05
 */

namespace AppBundle\ValueObject;


class PizzaInsertResult implements \JsonSerializable
{
    const STATUS_SUCCESS = 'success';
    const STATUS_FAIL = 'failed';

    private $status;
    private $pizzaIds;

    /**
     * PizzaInsertResult constructor.
     * @param $pizzaIds
     */
    public function __construct(array $pizzaIds)
    {
        $this->status = self::STATUS_SUCCESS;
        if (empty($pizzaIds)) {
            $this->status = self::STATUS_FAIL;
        }

        $this->pizzaIds = $pizzaIds;
    }

    public function jsonSerialize()
    {
        return [
            'status' => $this->status,
            'pizza_ids' => $this->pizzaIds
        ];
    }


    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getPizzaIds()
    {
        return $this->pizzaIds;
    }



}