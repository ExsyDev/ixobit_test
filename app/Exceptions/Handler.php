<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e): Response|JsonResponse|RedirectResponse|\Symfony\Component\HttpFoundation\Response
    {
        if ($e instanceof ModelNotFoundException) {
            return $this->modelNotFoundResponse($e);
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            return $this->methodNotAllowedResponse($e);
        }

        return parent::render($request, $e); // TODO: Change the autogenerated stub
    }

    /**
     * @param $exception
     * @return JsonResponse
     */
    private function modelNotFoundResponse($exception): JsonResponse
    {
        $modelName = class_basename($exception->getModel());

        return response()->json(['error' => "$modelName not found"], 404);
    }

    /**
     * @param $exception
     * @return JsonResponse
     */
    private function methodNotAllowedResponse($exception): JsonResponse
    {
        return response()->json(
            [
                'error' => 'Method not allowed for this route',
                'allowed_methods' => $exception->getHeaders()['Allow'] ?? []
            ],
            405
        );
    }
}
