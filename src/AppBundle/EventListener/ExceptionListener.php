<?php
/**
 * Created by PhpStorm.
 * User: jordi
 * Date: 8/10/17
 * Time: 14:51
 */

namespace AppBundle\EventListener;


use AppBundle\Exception\Exception;
use AppBundle\Exception\SystemErrorException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        dump($exception);die;

        if ($exception instanceof Exception) {
            $event->setResponse(new JsonResponse($exception));
        } else {
            // Send exception to email or slack, and hide system exception with a <<generic>> exception.
            $event->setResponse(new JsonResponse(new SystemErrorException()));

            // Todo: Send email or message to Slack for system error.
        }


    }
}