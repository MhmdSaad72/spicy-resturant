<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\AboutService;
use Illuminate\Http\Request;

class AboutServicesController extends Controller
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
            $aboutservices = AboutService::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('icon', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $aboutservices = AboutService::latest()->paginate($perPage);
        }

        return view('admin.about-services.index', compact('aboutservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.about-services.create');
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
    			'icon' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg',
    			'content' => 'required|max:65535',
    			'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg'
    		]);
        $requestData = $request->all();
        $requestData['icon'] = $request->file('icon')
                                        ->store('uploads', 'public');
        $requestData['image'] = $request->file('image')
                                        ->store('uploads', 'public');

        AboutService::create($requestData);

        return redirect('admin/about-services')->with('flash_message', 'AboutService added!');
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
        $aboutservice = AboutService::findOrFail($id);

        return view('admin.about-services.show', compact('aboutservice'));
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
        $aboutservice = AboutService::findOrFail($id);

        return view('admin.about-services.edit', compact('aboutservice'));
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
    			'icon' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
    			'content' => 'required|max:65535',
    			'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg'
    		]);
        $requestData = $request->all();

        if ($request->hasFile('icon')) {
            $requestData['icon'] = $request->file('icon')
                                            ->store('uploads', 'public');
        }
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                                            ->store('uploads', 'public');
        }

        $aboutservice = AboutService::findOrFail($id);
        $aboutservice->update($requestData);

        return redirect('admin/about-services')->with('flash_message', 'AboutService updated!');
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
        AboutService::destroy($id);

        return redirect('admin/about-services')->with('flash_message', 'AboutService deleted!');
    }
}
