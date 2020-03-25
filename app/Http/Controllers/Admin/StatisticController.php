<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
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
            $statistic = Statistic::where('title', 'LIKE', "%$keyword%")
                ->orWhere('count', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $statistic = Statistic::latest()->paginate($perPage);
        }

        return view('admin.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.statistic.create');
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
    			'count' => 'required|integer',
    			'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg',
          'content' => 'required|max:65535'
    		]);
        $requestData = $request->all();
        $requestData['image'] = $request->file('image')
                                        ->store('uploads', 'public');

        Statistic::create($requestData);

        return redirect('admin/statistic')->with('flash_message', 'Statistic added!');
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
      abort(404);
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
        $statistic = Statistic::findOrFail($id);

        return view('admin.statistic.edit', compact('statistic'));
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
    			'count' => 'required|integer',
    			'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
          'content' => 'required|max:65535'
    		]);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                                            ->store('uploads', 'public');
        }

        $statistic = Statistic::findOrFail($id);
        $statistic->update($requestData);

        return redirect('admin/statistic')->with('flash_message', 'Statistic updated!');
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
        Statistic::destroy($id);

        return redirect('admin/statistic')->with('flash_message', 'Statistic deleted!');
    }
}
