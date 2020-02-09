<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\BranchHead;
use Illuminate\Http\Request;

class BranchHeadController extends Controller
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
            $branchhead = BranchHead::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $branchhead = BranchHead::latest()->paginate($perPage);
        }

        return view('admin.branch-head.index', compact('branchhead'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.branch-head.create');
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

        BranchHead::create($requestData);

        return redirect('admin/branch-head')->with('flash_message', 'BranchHead added!');
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
        $branchhead = BranchHead::findOrFail($id);

        return view('admin.branch-head.show', compact('branchhead'));
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
        $branchhead = BranchHead::findOrFail($id);

        return view('admin.branch-head.edit', compact('branchhead'));
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

        $branchhead = BranchHead::findOrFail($id);
        $branchhead->update($requestData);

        return redirect('admin/branch-head')->with('flash_message', 'BranchHead updated!');
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
        BranchHead::destroy($id);

        return redirect('admin/branch-head')->with('flash_message', 'BranchHead deleted!');
    }
}
