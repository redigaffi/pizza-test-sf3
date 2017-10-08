<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 17:45
 */

namespace AppBundle\ValueObject;


class PizzaRemoveIngredientsResult implements \JsonSerializable
{
    const STATUS_SUCCESS = 'success';
    const STATUS_FAIL = 'failed';

    private $status;
    private $removed;

    /**
     * PizzaRemoveIngredientsResult constructor.
     * @param $removed
     */
    public function __construct($removed)
    {
        $this->status = self::STATUS_FAIL;
        if ($removed > 0) {
            $this->status = self::STATUS_SUCCESS;
        }

        $this->removed = $removed;
    }

    public function jsonSerialize()
    {
        return [
            'status' => $this->status,
            'removed' => $this->removed
        ];
    }


}