<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MasterChef;
use Illuminate\Http\Request;

class MasterChefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $masterchefs = MasterChef::first();
        return view('admin.master-chefs.index', compact('masterchefs'));
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
        $masterchef = MasterChef::findOrFail($id);

        return view('admin.master-chefs.edit', compact('masterchef'));
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
    			'title' => 'required',
          'description' => 'required',
    		]);
        $requestData = $request->all();

        $masterchef = MasterChef::findOrFail($id);
        $masterchef->update($requestData);

        return redirect('admin/master-chefs')->with('flash_message', 'MasterChef updated!');
    }
}
