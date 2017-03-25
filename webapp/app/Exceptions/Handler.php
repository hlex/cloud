<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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
      //   echo $exception->message;
      // echo 'ValidationException?'.' = '.$exception instanceof ValidationException;
      // echo 'NotFoundHttpException?'.' = '.$exception instanceof NotFoundHttpException;
      // echo 'HttpException?'.' = '.$exception instanceof HttpException;
      // echo 'isHttpException?'.' = '.$exception instanceof NotFoundHttpException;
      // exit;
      return parent::render($request, $exception);

      switch ($exception) {
        case $exception instanceof ModelNotFoundException:
          break;
          case $exception instanceof ValidationException:
              break;
          case $exception instanceof PledgeException:
              break;
          case $exception instanceof DAOException:
              break;
          default:
              # code...
              return parent::render($request, $exception);
              break;
      }

      return response()->json([
          'status' => 'SUCCESSFUL',
          'trx-id' => hash('md5',time()),
          'fault' => [
              'exception' => $exception->getClass(),
              'http-eror-code' => $exception->getCode(),
              'http-error' => $exception->getHttpError(),
              'technical-error-code' => $exception->technicalErrorCode,
              'technical-error' => $exception->getTechnicalErrorMessage(),
              'th-message' => $exception->messages['th'],
              'en-message' => $exception->messages['en'],
              'technical-message' => $exception->messages['technical'],
          ],
          'process-instance' => 'tmsapnpr1 (instance: '. config('app.env') .')',
      ]);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest('login');
    }
}
