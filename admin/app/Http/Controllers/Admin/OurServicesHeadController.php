<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\OurServicesHead;
use Illuminate\Http\Request;

class OurServicesHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ourserviceshead = OurServicesHead::first();
        return view('admin.our-services-head.index', compact('ourserviceshead'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.our-services-head.create');
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
        ]);

        $requestData = $request->all();

        OurServicesHead::create($requestData);

        return redirect('admin/our-services-head')->with('flash_message', 'OurServicesHead added!');
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
        $ourserviceshead = OurServicesHead::findOrFail($id);

        return view('admin.our-services-head.show', compact('ourserviceshead'));
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
        $ourserviceshead = OurServicesHead::findOrFail($id);

        return view('admin.our-services-head.edit', compact('ourserviceshead'));
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
        ]);
        
        $requestData = $request->all();

        $ourserviceshead = OurServicesHead::findOrFail($id);
        $ourserviceshead->update($requestData);

        return redirect('admin/our-services-head')->with('flash_message', 'OurServicesHead updated!');
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
        OurServicesHead::destroy($id);

        return redirect('admin/our-services-head')->with('flash_message', 'OurServicesHead deleted!');
    }
}
