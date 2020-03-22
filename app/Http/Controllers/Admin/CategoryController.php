<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Category;
use App\BasicDetail;
use App\SlideMenu;
use Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
            $category = Category::where('name', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $category = Category::latest()->paginate($perPage);
        }

        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.category.create');
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
    			'name' => 'required|max:255|unique:categories,name',
          'title' => 'required|max:255',
          'description' => 'required|max:255',
    		]);
        $requestData = $request->all();

        Category::create($requestData);

        return redirect('admin/category')->with('flash_message', 'Category added!');
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
        $category = Category::findOrFail($id);

        return view('admin.category.show', compact('category'));
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
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
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
        $category = Category::findOrFail($id);
        $this->validate($request, [
    			'name' => 'required|max:255|unique:categories,name,'.$category->id,
          'title' => 'required|max:255',
          'description' => 'required|max:255',
    		]);
        $requestData = $request->all();

        $category->update($requestData);

        return redirect('admin/category')->with('flash_message', 'Category updated!');
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
        Category::destroy($id);

        return redirect('admin/category')->with('flash_message', 'Category deleted!');
    }


    /* ==================================
        Display category page on site
    =====================================*/

    public function showCategory($id)
    {
      $category = Category::findOrFail($id);
      $basicDetail = BasicDetail::first();
      $dishes = SlideMenu::where('category_id' , $id)->get();
      $count = $dishes->count();
      if (Auth::check()) {
        $bookings = Auth::user()->bookings->count();
      }else {
        $bookings = 0 ;
      }
      return view('pages.categories.show' , compact('category' , 'basicDetail' , 'dishes' , 'count' , 'bookings'));
    }


    /* ==================================
        Display all categories for site
    =====================================*/

    public function allCategories()
    {
      $categories = Category::all();
      $basicDetail = BasicDetail::first();
      $count = $categories->count();
      if (Auth::check()) {
        $bookings = Auth::user()->bookings->count();
      }else {
        $bookings = 0 ;
      }
      return view('pages.categories.index' , compact('categories' , 'basicDetail' , 'count' , 'bookings'));
    }
  }
