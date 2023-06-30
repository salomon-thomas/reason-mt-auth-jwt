<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Contracts\Container\BindingResolutionException;
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

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof MethodNotAllowedHttpException) {
           if ($request->wantsJson()) {
                return response()->json(['message' => 'Method not allowed'], 405);
            } else {
                abort(404);
            }
        }
        if ($exception instanceof BindingResolutionException) {
           if ($request->wantsJson()) {
                return response()->json(['message' => 'Someting went wrong'], 405);
            } else {
                abort(404);
            }
        }
        return parent::render($request, $exception);
    }
}
