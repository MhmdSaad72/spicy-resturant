<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\DropLine;
use Illuminate\Http\Request;

class DropLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $dropline = DropLine::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('facebook', 'LIKE', "%$keyword%")
                ->orWhere('twitter', 'LIKE', "%$keyword%")
                ->orWhere('instagram', 'LIKE', "%$keyword%")
                ->orWhere('youtube', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $dropline = DropLine::latest()->paginate($perPage);
        }

        return view('admin.drop-line.index', compact('dropline'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.drop-line.create');
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
          'description' => 'required',
          'content' => 'required',
          'facebook' => 'url',
          'twitter' => 'url',
          'instagram' => 'url',
          'youtube' => 'url',
    		]);
        $requestData = $request->all();

        DropLine::create($requestData);

        return redirect('admin/drop-line')->with('flash_message', 'DropLine added!');
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
        $dropline = DropLine::findOrFail($id);

        return view('admin.drop-line.show', compact('dropline'));
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
        $dropline = DropLine::findOrFail($id);

        return view('admin.drop-line.edit', compact('dropline'));
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
          'facebook' => 'url',
          'twitter' => 'url',
          'instagram' => 'url',
          'youtube' => 'url',
    		]);
        $requestData = $request->all();

        $dropline = DropLine::findOrFail($id);
        $dropline->update($requestData);

        return redirect('admin/drop-line')->with('flash_message', 'DropLine updated!');
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
        DropLine::destroy($id);

        return redirect('admin/drop-line')->with('flash_message', 'DropLine deleted!');
    }
}
