<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\FoodMenu;
use Illuminate\Http\Request;

class FoodMenuController extends Controller
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
            $foodmenu = FoodMenu::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $foodmenu = FoodMenu::latest()->paginate($perPage);
        }

        return view('admin.food-menu.index', compact('foodmenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.food-menu.create');
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
    			'content' => 'required',
    		]);
        $requestData = $request->all();

        FoodMenu::create($requestData);

        return redirect('admin/food-menu')->with('flash_message', 'FoodMenu added!');
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
        $foodmenu = FoodMenu::findOrFail($id);

        return view('admin.food-menu.show', compact('foodmenu'));
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
        $foodmenu = FoodMenu::findOrFail($id);

        return view('admin.food-menu.edit', compact('foodmenu'));
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
    			'content' => 'required',
    		]);
        $requestData = $request->all();

        $foodmenu = FoodMenu::findOrFail($id);
        $foodmenu->update($requestData);

        return redirect('admin/food-menu')->with('flash_message', 'FoodMenu updated!');
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
        FoodMenu::destroy($id);

        return redirect('admin/food-menu')->with('flash_message', 'FoodMenu deleted!');
    }
}
