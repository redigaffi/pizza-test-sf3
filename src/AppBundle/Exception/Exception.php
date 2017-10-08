<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 14:53
 */

namespace AppBundle\Exception;


class Exception extends \Exception implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return [
            'code' => $this->code,
            'message' => $this->message
        ];
    }

}