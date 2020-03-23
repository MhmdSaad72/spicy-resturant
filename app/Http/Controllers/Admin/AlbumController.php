<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Album;
use App\BasicDetail;
use App\NavBar;
use Illuminate\Http\Request;

class AlbumController extends Controller
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
            $album = Album::where('title', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $album = Album::latest()->paginate($perPage);
        }

        return view('admin.album.index', compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.album.create');
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
    			'title' => 'required|max:255',
    			'name' => 'required|max:255',
    			'description' => 'required|max:255',
    			'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg'
    		]);
        $requestData = $request->all();
        $requestData['image'] = $request->file('image')
                                        ->store('uploads', 'public');

        Album::create($requestData);

        return redirect('admin/album')->with('flash_message', 'Album added!');
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
        $album = Album::findOrFail($id);

        return view('admin.album.show', compact('album'));
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
        $album = Album::findOrFail($id);

        return view('admin.album.edit', compact('album'));
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
    			'name' => 'required|max:255',
    			'description' => 'required|max:255',
    			'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg'
    		]);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                                            ->store('uploads', 'public');
        }

        $album = Album::findOrFail($id);
        $album->update($requestData);

        return redirect('admin/album')->with('flash_message', 'Album updated!');
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
        Album::destroy($id);

        return redirect('admin/album')->with('flash_message', 'Album deleted!');
    }

    /*======================================
            display gallery page
    ========================================*/
    public function gallery()
    {
      $basicDetail = BasicDetail::first();
      $navbar = NavBar::first();
      $album = Album::all();
      return view('pages.gallery.gallery' , compact('basicDetail' , 'navbar' , 'album'));
    }
}
