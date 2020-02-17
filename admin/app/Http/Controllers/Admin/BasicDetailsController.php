<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\BasicDetail;
use Illuminate\Http\Request;

class BasicDetailsController extends Controller
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
            $basicdetails = BasicDetail::where('name', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('reservation', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('hot_line', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $basicdetails = BasicDetail::latest()->paginate($perPage);
        }

        return view('admin.basic-details.index', compact('basicdetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.basic-details.create');
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
          'content' => 'required|max:255',
          'reservation' => 'required|max:255',
          'logo' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg',
          'hot_line' =>'required',
    		]);
        $requestData = $request->all();
        $requestData['logo'] = $request->file('logo')
                                        ->store('uploads', 'public');

        BasicDetail::create($requestData);

        return redirect('admin/basic-details')->with('flash_message', 'BasicDetail added!');
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
        $basicdetail = BasicDetail::findOrFail($id);

        return view('admin.basic-details.show', compact('basicdetail'));
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
        $basicdetail = BasicDetail::findOrFail($id);

        return view('admin.basic-details.edit', compact('basicdetail'));
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
          'content' => 'required|max:255',
          'reservation' => 'required|max:255',
          'logo' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
          'hot_line' =>'required',
    		]);
        $requestData = $request->all();
        $requestData['logo'] = $request->file('logo')
                                        ->store('uploads', 'public');

        $basicdetail = BasicDetail::findOrFail($id);
        $basicdetail->update($requestData);

        return redirect('admin/basic-details')->with('flash_message', 'Basic Details updated!');
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
        BasicDetail::destroy($id);

        return redirect('admin/basic-details')->with('flash_message', 'BasicDetail deleted!');
    }
}
