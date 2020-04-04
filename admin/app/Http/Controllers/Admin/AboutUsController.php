<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\AboutU;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $aboutus = AboutU::first();
        return view('admin.about-us-hero.index', compact('aboutus'));
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
        $aboutus = AboutU::findOrFail($id);

        return view('admin.about-us-hero.edit', compact('aboutus'));
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
    			'content' => 'required|max:65535',
    			'description' => 'required|max:255',
    		]);
        $requestData = $request->all();

        $aboutus = AboutU::findOrFail($id);
        $aboutus->update($requestData);

        return redirect('admin/about-us/hero-section')->with('flash_message', 'AboutU updated!');
    }
}
