<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\FoodMenu;
use Illuminate\Http\Request;

class FoodMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $foodmenu = FoodMenu::first();
        return view('admin.food-menu.index', compact('foodmenu'));
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
        $foodmenu = FoodMenu::findOrFail($id);

        return view('admin.food-menu.edit', compact('foodmenu'));
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
    			'title' => 'required|max:255',
    			'description' => 'required|max:255',
    			'content' => 'required|max:65535',
    		]);
        $requestData = $request->all();

        $foodmenu = FoodMenu::findOrFail($id);
        $foodmenu->update($requestData);

        return redirect('admin/food-menu')->with('flash_message', 'FoodMenu updated!');
    }

}
