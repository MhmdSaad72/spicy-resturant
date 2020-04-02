<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Baristum;
use Illuminate\Http\Request;

class BaristaController extends Controller
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
            $barista = Baristum::where('name', 'LIKE', "%$keyword%")
                ->orWhere('position', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $barista = Baristum::latest()->paginate($perPage);
        }

        return view('admin.barista.index', compact('barista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.barista.create');
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
    			'name' => 'required|max:255',
    			'position' => 'required|max:255',
    			'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg'
    		]);
        $requestData = $request->all();
        $requestData['image'] = $request->file('image')
                                        ->store('uploads', 'public');

        Baristum::create($requestData);

        return redirect('admin/barista')->with('flash_message', 'Baristum added!');
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
        $baristum = Baristum::findOrFail($id);

        return view('admin.barista.show', compact('baristum'));
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
        $baristum = Baristum::findOrFail($id);

        return view('admin.barista.edit', compact('baristum'));
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
    			'position' => 'required|max:255',
    			'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
    		]);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                                            ->store('uploads', 'public');
        }


        $baristum = Baristum::findOrFail($id);
        $baristum->update($requestData);

        return redirect('admin/barista')->with('flash_message', 'Baristum updated!');
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
        Baristum::destroy($id);

        return redirect('admin/barista')->with('flash_message', 'Baristum deleted!');
    }
}
