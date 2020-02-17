<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\FeatureDishBody;
use Illuminate\Http\Request;

class FeatureDishBodyController extends Controller
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
            $featuredishbody = FeatureDishBody::where('title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('old_price', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $featuredishbody = FeatureDishBody::latest()->paginate($perPage);
        }

        return view('admin.feature-dish-body.index', compact('featuredishbody'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.feature-dish-body.create');
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
    			'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg',
    			'content' => 'required',
          'price' => 'required|max:7|gte:0',
          'old_price' => 'max:7',
          'old_price' => 'gte:0',
    		]);
        $requestData = $request->all();
        $requestData['image'] = $request->file('image')
                                        ->store('uploads', 'public');

        FeatureDishBody::create($requestData);

        return redirect('admin/feature-dish-body')->with('flash_message', 'FeatureDishBody added!');
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
        $featuredishbody = FeatureDishBody::findOrFail($id);

        return view('admin.feature-dish-body.show', compact('featuredishbody'));
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
        $featuredishbody = FeatureDishBody::findOrFail($id);

        return view('admin.feature-dish-body.edit', compact('featuredishbody'));
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
          'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
          'content' => 'required',
          'price' => 'required|max:7|gte:0',
          'old_price' => 'max:7',
          'old_price' => 'gte:0',

    		]);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                                            ->store('uploads', 'public');
        }

        $featuredishbody = FeatureDishBody::findOrFail($id);
        $featuredishbody->update($requestData);

        return redirect('admin/feature-dish-body')->with('flash_message', 'FeatureDishBody updated!');
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
        FeatureDishBody::destroy($id);

        return redirect('admin/feature-dish-body')->with('flash_message', 'FeatureDishBody deleted!');
    }
}
