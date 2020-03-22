<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Chef;
use Illuminate\Http\Request;

class ChefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $chefs = Chef::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('facebook', 'LIKE', "%$keyword%")
                ->orWhere('twitter', 'LIKE', "%$keyword%")
                ->orWhere('instagram', 'LIKE', "%$keyword%")
                ->orWhere('youtube', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $chefs = Chef::latest()->paginate($perPage);
        }

        return view('admin.chefs.index', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.chefs.create');
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
    			'name' => 'required',
          'description' => 'required',
          'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg',
          'facebook' => 'url',
          'twitter' => 'url',
          'youtube' => 'url',
          'instagram' => 'url',
    		]);
        $requestData = $request->all();
        $requestData['image']= $request->file('image')
                                        ->store('uploads', 'public');

        Chef::create($requestData);

        return redirect('admin/chefs')->with('flash_message', 'Chef added!');
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
        $chef = Chef::findOrFail($id);

        return view('admin.chefs.show', compact('chef'));
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
        $chef = Chef::findOrFail($id);

        return view('admin.chefs.edit', compact('chef'));
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
          'name' => 'required',
          'description' => 'required',
          'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
          'facebook' => 'url',
          'twitter' => 'url',
          'youtube' => 'url',
          'instagram' => 'url',
    		]);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                                            ->store('uploads', 'public');
        }

        $chef = Chef::findOrFail($id);
        $chef->update($requestData);

        return redirect('admin/chefs')->with('flash_message', 'Chef updated!');
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
        Chef::destroy($id);

        return redirect('admin/chefs')->with('flash_message', 'Chef deleted!');
    }
}
