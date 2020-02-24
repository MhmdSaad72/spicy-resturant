<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\About;
use App\AboutU;
use App\Chef;
use App\MasterChef;
use App\Gallary;
use App\Album;
use App\BasicDetail;
use App\Philosophy;
use App\Statistic;
use App\Award;
use App\Availability;
use App\AboutService;
use \Carbon\Carbon ;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $aboutUs = AboutU::first();
        $chefs = Chef::all();
        $chefHead = MasterChef::first();
        $gallary = Gallary::first();
        $album = Album::all();
        $basicDetail = BasicDetail::first();
        $philosophy = Philosophy::first();
        $statistics = Statistic::all();
        $award = Award::first();
        return view('pages.about.index', compact('aboutUs' , 'chefs' , 'chefHead' , 'gallary' , 'album', 'basicDetail' , 'philosophy' , 'statistics' , 'award'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.about.create');
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

        $requestData = $request->all();

        About::create($requestData);

        return redirect('pages/about')->with('flash_message', 'About added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $aboutUs = AboutU::first();
        $album = Album::all();
        $basicDetail = BasicDetail::first();
        $philosophy = Philosophy::first();
        $aboutservices = AboutService::all();
        $availability = Availability::first();
        $availability->start_time = Carbon::parse($availability->start_time)->format('h:i A');
        $availability->end_time = Carbon::parse($availability->end_time)->format('h:i A');
        return view('pages.about.show', compact('aboutUs' , 'album' , 'basicDetail' , 'philosophy' , 'availability' , 'aboutservices'));
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
        $about = About::findOrFail($id);

        return view('pages.about.edit', compact('about'));
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

        $requestData = $request->all();

        $about = About::findOrFail($id);
        $about->update($requestData);

        return redirect('pages/about')->with('flash_message', 'About updated!');
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
        About::destroy($id);

        return redirect('pages/about')->with('flash_message', 'About deleted!');
    }
}
