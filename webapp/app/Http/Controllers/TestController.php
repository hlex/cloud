<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\ValidationException;
class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // abort(500);
      // try {
      // return config('app.env');
      throw new ValidationException('Division by zero.', 500);
      // } catch(\Exception $e) {
      //     echo "<pre>";
      //     echo $e;
      //     echo "</pre>";
      // }
      return view('home');
    }
}
