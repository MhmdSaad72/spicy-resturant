<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\OurStory;
use Illuminate\Http\Request;

class OurStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ourstory = OurStory::first();
        return view('admin.our-story.index', compact('ourstory'));
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
        $ourstory = OurStory::findOrFail($id);

        return view('admin.our-story.edit', compact('ourstory'));
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
          'content' => 'required',
    		]);
        $requestData = $request->all();

        $ourstory = OurStory::findOrFail($id);
        $ourstory->update($requestData);

        return redirect('admin/our-story')->with('flash_message', 'Our Story updated!');
    }

}
