<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 14:56
 */

namespace AppBundle\Exception;


class SystemErrorException extends Exception
{
    protected $code = -2;
    protected $message = 'The system has failed, contact I.T department.';
}