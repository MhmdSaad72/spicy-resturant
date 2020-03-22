<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\NavBar;
use Illuminate\Http\Request;

class NavBarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $navbar = NavBar::first();
        return view('admin.nav-bar.index', compact('navbar'));
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
        $navbar = NavBar::findOrFail($id);

        return view('admin.nav-bar.edit', compact('navbar'));
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
    			'home' => 'required|max:255',
    			'about' => 'required|max:255',
    			'about_1' => 'required|max:255',
    			'about_2' => 'required|max:255',
    			'contact' => 'required|max:255',
    			'contact_1' => 'required|max:255',
    			'contact_2' => 'required|max:255',
    			'menu' => 'required|max:255',
    			'menu_1' => 'required|max:255',
    			'menu_2' => 'required|max:255',
    			'pages' => 'required|max:255',
    		]);
        $requestData = $request->all();

        $navbar = NavBar::findOrFail($id);
        $navbar->update($requestData);

        return redirect('admin/nav-bar')->with('flash_message', 'NavBar updated!');
    }

}
