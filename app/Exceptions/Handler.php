<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Prophecy\Exception\Doubler\MethodNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceof NotFoundHttpException) {
            return response()->json(
                [
                    'data' => [],
                    'message' => 'Route does not exist',
                    'hasError' => 1,
                    'status' => false
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        if($exception instanceof ModelNotFoundException) {
            return response()->json(
                [
                    'data' => [],
                    'message' => 'No record found for the given input',
                    'hasError' => 1,
                    'status' => false
                ],
                Response::HTTP_BAD_REQUEST
            );
        }

        if($exception instanceof MethodNotFoundException) {
            return response()->json(
                [
                    'data' => [],
                    'message' => $exception->getMessage(),
                    'hasError' => 1,
                    'status' => false
                ],
                Response::HTTP_BAD_REQUEST
            );
        }

        if($exception instanceof MethodNotAllowedException) {
            return response()->json(
                [
                    'data' => [],
                    'message' => $exception->getMessage(),
                    'hasError' => 1,
                    'status' => false
                ],
                Response::HTTP_BAD_REQUEST
            );
        }

        return parent::render($request, $exception);
    }
}
