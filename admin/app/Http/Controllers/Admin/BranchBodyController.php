<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\BranchBody;
use Illuminate\Http\Request;

class BranchBodyController extends Controller
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
            $branchbody = BranchBody::where('place', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $branchbody = BranchBody::latest()->paginate($perPage);
        }

        return view('admin.branch-body.index', compact('branchbody'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.branch-body.create');
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
    			'place' => 'required',
          'address' => 'required',
          'phone' => 'required|unique:branch_bodies,phone',
          'email' => 'required|email|unique:branch_bodies,email',
    		]);
        $requestData = $request->all();

        BranchBody::create($requestData);

        return redirect('admin/branch-body')->with('flash_message', 'BranchBody added!');
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
        $branchbody = BranchBody::findOrFail($id);

        return view('admin.branch-body.show', compact('branchbody'));
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
        $branchbody = BranchBody::findOrFail($id);

        return view('admin.branch-body.edit', compact('branchbody'));
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
        $branchbody = BranchBody::findOrFail($id);
        $this->validate($request, [
          'title' => 'required',
          'address' => 'required',
          'phone' => 'required|unique:branch_bodies,phone' . $branchbody->id,
          'email' => 'required|email|unique:branch_bodies,email' . $branchbody->id,
    		]);
        $requestData = $request->all();

        $branchbody->update($requestData);

        return redirect('admin/branch-body')->with('flash_message', 'BranchBody updated!');
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
        BranchBody::destroy($id);

        return redirect('admin/branch-body')->with('flash_message', 'BranchBody deleted!');
    }
}
