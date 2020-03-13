<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\BasicDetail;
use Illuminate\Http\Request;

class BasicDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $basicDetail = BasicDetail::first();
        return view('admin.basic-details.index', compact('basicDetail'));
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
        $basicdetail = BasicDetail::findOrFail($id);

        return view('admin.basic-details.edit', compact('basicdetail'));
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
          'name' => 'required|max:255',
          'content' => 'required|max:255',
          'logo' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
          'footer_logo' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
          'hot_line' =>'required',
    		]);
        $requestData = $request->all();
        if ($request->hasFile('logo')) {
          $requestData['logo'] = $request->file('logo')
                                         ->store('uploads', 'public');
        }
        if ($request->hasFile('footer_logo')) {
          $requestData['footer_logo'] = $request->file('footer_logo')
                                         ->store('uploads', 'public');
        }

        $basicdetail = BasicDetail::findOrFail($id);
        $basicdetail->update($requestData);

        return redirect('admin/basic-details')->with('flash_message', 'Basic Details updated!');
    }
}
