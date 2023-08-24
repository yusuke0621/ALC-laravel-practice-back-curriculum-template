<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function(HttpException $e, $request) {
            if ($request->is('api/*')) {
                $message = '';
                $statusCode = $e->getStatusCode();

                switch ($statusCode) {
                    case 401:
                        $message = __('Unauthorized');
                        break;
                    case 403:
                        $message = __($e->getMessage() ?: 'Forbidden');
                        break;
                    case 404:
                        $message = __('Not Found');
                        break;
                    case 405:
                        $message = __($e->getMessage() ?: 'Method Not Allowed');
                        break;
                    case 419:
                        $message = __('Page Expired');
                        break;
                    case 429:
                        $message = __('Too Many Requests');
                        break;
                    case 500:
                        $message = __('Server Error');
                        break;
                    case 503:
                        $message = __('Service Unavailable');
                        break;
                    default:
                        $message = __($e->getMessage() ?: 'Unknown Error');
                }

                return response()->json([
                    'data' => null,
                    'message' => $message,
                    'meta' => [],
                ], $statusCode, [
                    'Content-Type' => 'application/problem+json',
                ]);
            }
        });
    }
}
