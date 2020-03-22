<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MainDish;
use App\SlideMenu;
use Illuminate\Http\Request;

class MainDishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $maindish = MainDish::first();
        return view('admin.main-dish.index', compact('maindish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $maindish = MainDish::findOrFail($id);
        $dishes = SlideMenu::all();

        return view('admin.main-dish.edit', compact('maindish' , 'dishes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'dish_id' => 'required',
    		]);
        $requestData = $request->all();

        $maindish = MainDish::findOrFail($id);
        $maindish->update($requestData);

        return redirect('admin/main-dish')->with('flash_message', 'MainDish updated!');
    }
}
