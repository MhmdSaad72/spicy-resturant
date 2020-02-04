<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MenuList;
use App\SlideMenu;
use Illuminate\Http\Request;

class MenuListController extends Controller
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
            $menulist = MenuList::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('slide_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $menulist = MenuList::latest()->paginate($perPage);
        }

        return view('admin.menu-list.index', compact('menulist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $slideMenus = SlideMenu::select('id' , 'title')->get();
        return view('admin.menu-list.create' , compact('slideMenus'));
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
    			'slide_id' => 'required',
    		]);
        $requestData = $request->all();

        MenuList::create($requestData);

        return redirect('admin/menu-list')->with('flash_message', 'MenuList added!');
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
        $menulist = MenuList::findOrFail($id);

        return view('admin.menu-list.show', compact('menulist'));
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
        $menulist = MenuList::findOrFail($id);

        return view('admin.menu-list.edit', compact('menulist'));
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
    			'slide_id' => 'required'
    		]);
        $requestData = $request->all();

        $menulist = MenuList::findOrFail($id);
        $menulist->update($requestData);

        return redirect('admin/menu-list')->with('flash_message', 'MenuList updated!');
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
        MenuList::destroy($id);

        return redirect('admin/menu-list')->with('flash_message', 'MenuList deleted!');
    }
}
