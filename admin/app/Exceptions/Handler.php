<?php

namespace App\Exceptions;

use Exception;
use App\BasicDetail;
use App\SlideMenu;
use App\MainDish;
use App\NavBar;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
        $basicDetail = BasicDetail::first();
        $navbar = NavBar::first();
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();
        if ($this->isHttpException($exception)) {
             if ($exception->getStatusCode() == 404) {
                 return response()->view('pages.404',compact('basicDetail','navbar','newDishes','mainDish') , 404 );
             }elseif ($exception->getStatusCode() == 403) {
                 return response()->view('pages.403',compact('basicDetail','navbar','newDishes','mainDish') , 403 );
             }
         }
        return parent::render($request, $exception);
    }
}
