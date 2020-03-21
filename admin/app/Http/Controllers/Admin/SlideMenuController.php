<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\SlideMenu;
use App\Category;
use App\Tag;
use App\DishReview;
use Auth;
use Illuminate\Http\Request;

class SlideMenuController extends Controller
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
            $slidemenu = SlideMenu::where('title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $slidemenu = SlideMenu::latest()->paginate($perPage);
        }

        return view('admin.slide-menu.index', compact('slidemenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories =  Category::all();
        $tags = Tag::all();
        return view('admin.slide-menu.create' , compact('categories' , 'tags'));
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
      // dd($request->all());
        $this->validate($request, [
    			'title' => 'required|max:255',
    			'price' => 'required|max:7|gte:0',
    			'content' => 'required|max:65535',
          'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg',
          'category_id' => 'required',
          'tag_id' => 'required',
          'more_content' => 'required|max:65535',
          'weight' => 'nullable|gte:0',
          'weight' => 'nullable|max:7',
          'calories' => 'nullable|gte:0',
          'calories' => 'nullable|max:7',
          'discount' =>'nullable|integer|gte:0|max:100',
    		]);
        $requestData = $request->all();
        $requestData['image'] = $request->file('image')
                                        ->store('uploads', 'public');

        SlideMenu::create($requestData);

        return redirect('admin/slide-menu')->with('flash_message', 'SlideMenu added!');
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
        $slidemenu = SlideMenu::findOrFail($id);

        return view('admin.slide-menu.show', compact('slidemenu'));
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
        $slidemenu = SlideMenu::findOrFail($id);
        $categories =  Category::all();
        $tags = Tag::all();
        $slidemenu->afterDiscount();
        // dd($slidemenu);

        return view('admin.slide-menu.edit', compact('slidemenu' , 'categories' , 'tags'));
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
    			'price' => 'required|max:7|gte:0',
    			'content' => 'required|max:65535',
          'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
          'category_id' => 'required',
          'tag_id' => 'required',
          'more_content' => 'required|max:65535',
          'weight' => ['nullable', 'gte:0'],
          'weight' => ['nullable', 'max:7'],
          'calories' => ['nullable', 'gte:0'],
          'calories' => ['nullable', 'max:7'],
          'discount' =>'nullable|integer|gte:0|max:100',
    		]);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                                            ->store('uploads', 'public');
        }

        $slidemenu = SlideMenu::findOrFail($id);
        $slidemenu->update($requestData);

        return redirect('admin/slide-menu')->with('flash_message', 'SlideMenu updated!');
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
        SlideMenu::destroy($id);

        return redirect('admin/slide-menu')->with('flash_message', 'SlideMenu deleted!');
    }

}
