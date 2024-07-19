<?php 

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        if ($exception instanceof AuthorizationException) {
            return response()->view('errors.403', [], 403);
        }

        if ($exception instanceof HttpException && $exception->getStatusCode() === 500) {
            return response()->view('errors.500', [], 500);
        }

        return parent::render($request, $exception);
    }
}
