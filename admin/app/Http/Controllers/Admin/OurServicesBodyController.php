<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\OurServicesBody;
use Illuminate\Http\Request;

class OurServicesBodyController extends Controller
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
            $ourservicesbody = OurServicesBody::where('title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ourservicesbody = OurServicesBody::latest()->paginate($perPage);
        }

        return view('admin.our-services-body.index', compact('ourservicesbody'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.our-services-body.create');
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
    			'content' => 'required'
    		]);
        $requestData = $request->all();
        $requestData['image'] = $request->file('image')
                                        ->store('uploads', 'public');

        OurServicesBody::create($requestData);

        return redirect('admin/our-services-body')->with('flash_message', 'OurServicesBody added!');
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
        $ourservicesbody = OurServicesBody::findOrFail($id);

        return view('admin.our-services-body.show', compact('ourservicesbody'));
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
        $ourservicesbody = OurServicesBody::findOrFail($id);

        return view('admin.our-services-body.edit', compact('ourservicesbody'));
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
    			'content' => 'required'
    		]);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                                            ->store('uploads', 'public');
        }

        $ourservicesbody = OurServicesBody::findOrFail($id);
        $ourservicesbody->update($requestData);

        return redirect('admin/our-services-body')->with('flash_message', 'OurServicesBody updated!');
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
        OurServicesBody::destroy($id);

        return redirect('admin/our-services-body')->with('flash_message', 'OurServicesBody deleted!');
    }
}
