<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Philosophy;
use Illuminate\Http\Request;

class PhilosophyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $philosophy = Philosophy::first();
        return view('admin.philosophy.index', compact('philosophy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.philosophy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
    			'title' => 'required',
    			'name' => 'required',
    			'description' => 'required',
    			'position' => 'required',
          'content' => 'required',
    		]);
        $requestData = $request->all();

        Philosophy::create($requestData);

        return redirect('admin/philosophy')->with('flash_message', 'Philosophy added!');
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
        $philosophy = Philosophy::findOrFail($id);

        return view('admin.philosophy.show', compact('philosophy'));
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
        $philosophy = Philosophy::findOrFail($id);

        return view('admin.philosophy.edit', compact('philosophy'));
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
    			'name' => 'required',
    			'description' => 'required',
    			'position' => 'required',
          'content' => 'required',
    		]);
        $requestData = $request->all();

        $philosophy = Philosophy::findOrFail($id);
        $philosophy->update($requestData);

        return redirect('admin/philosophy')->with('flash_message', 'Philosophy updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Philosophy::destroy($id);

        return redirect('admin/philosophy')->with('flash_message', 'Philosophy deleted!');
    }
}
