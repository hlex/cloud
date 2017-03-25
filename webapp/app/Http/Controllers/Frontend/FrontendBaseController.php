<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class FrontendBaseController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Default Base FrontendController
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */
    public $props;
    public $title;
    public $folder;
    public $model;

    public function index() {
      $this->props['title'] = $this->title;
      return view('frontend.'.$this->folder.'.index', $this->props);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
      return view('frontend.'.$this->folder.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
      $this->log('store', $request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
      return view('frontend.'.$this->folder.'.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
      return view('frontend.'.$this->folder.'.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
      // $this->model->update($id, $request->all());
      return redirect()->back()->with('success', ['your message,here']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy() {
        return;
    }
}
