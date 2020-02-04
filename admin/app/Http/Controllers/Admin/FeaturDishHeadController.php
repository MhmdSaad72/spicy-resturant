<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\FeaturDishHead;
use Illuminate\Http\Request;

class FeaturDishHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $featurdishhead = FeaturDishHead::first();
        return view('admin.featur-dish-head.index', compact('featurdishhead'));
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
        $featurdishhead = FeaturDishHead::findOrFail($id);

        return view('admin.featur-dish-head.edit', compact('featurdishhead'));
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

        $featurdishhead = FeaturDishHead::findOrFail($id);
        $featurdishhead->update($requestData);

        return redirect('admin/featur-dish-head')->with('flash_message', 'FeaturDishHead updated!');
    }

}
