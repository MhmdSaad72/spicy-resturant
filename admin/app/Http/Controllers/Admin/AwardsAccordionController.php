<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\AwardsAccordion;
use Illuminate\Http\Request;

class AwardsAccordionController extends Controller
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
            $awardsaccordion = AwardsAccordion::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $awardsaccordion = AwardsAccordion::latest()->paginate($perPage);
        }

        return view('admin.awards-accordion.index', compact('awardsaccordion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.awards-accordion.create');
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
          'content' => 'required|max:65535',
    		]);
        $requestData = $request->all();

        AwardsAccordion::create($requestData);

        return redirect('admin/awards-accordion')->with('flash_message', 'AwardsAccordion added!');
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
        $awardsaccordion = AwardsAccordion::findOrFail($id);

        return view('admin.awards-accordion.edit', compact('awardsaccordion'));
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
          'content' => 'required|max:65535',
    		]);
        $requestData = $request->all();

        $awardsaccordion = AwardsAccordion::findOrFail($id);
        $awardsaccordion->update($requestData);

        return redirect('admin/awards-accordion')->with('flash_message', 'AwardsAccordion updated!');
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
        AwardsAccordion::destroy($id);

        return redirect('admin/awards-accordion')->with('flash_message', 'AwardsAccordion deleted!');
    }
}
