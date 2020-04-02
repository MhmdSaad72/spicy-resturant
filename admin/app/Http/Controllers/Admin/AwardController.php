<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $award = Award::first();
        return view('admin.award.index', compact('award'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        abort(404);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        abort(404);
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
        $award = Award::findOrFail($id);

        return view('admin.award.edit', compact('award'));
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
          'description' => 'required|max:255',
          'content' => 'required|max:65535',
    			'year' => 'required|date',
    		]);
        $requestData = $request->all();

        $award = Award::findOrFail($id);
        $award->update($requestData);

        return redirect('admin/award')->with('flash_message', 'Award updated!');
    }
}
