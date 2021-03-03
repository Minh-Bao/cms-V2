<?php

namespace App\Exceptions;

use Throwable;
use PDOException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

     /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof NotFoundHttpException){
            return response()->view('errors/404', ['invalid_url'=>true], 404);
        }

        if ($exception instanceof TokenMismatchException && Auth::guest()) {
            return response()->view('errors/403', ['invalid_url'=>true], 403);
        }

        if ($exception instanceof TokenMismatchException && getenv('APP_ENV') != 'local') {
            return redirect()->back()->withInput();
        }

        if($exception instanceof MethodNotAllowedHttpException && getenv('APP_ENV') != 'local') {
            error_log('Error :' . $exception->getMessage());
            abort(503);
        }

        if(($exception instanceof PDOException || $exception instanceof QueryException) && getenv('APP_ENV') != 'local') {
            error_log('Error :' . $exception->getMessage());
            abort(500);
        }
        if ($exception instanceof ClientException) {
            error_log('Error :' . $exception->getMessage());
            abort(500);
        }
        return parent::render($request, $exception);

    }

}
