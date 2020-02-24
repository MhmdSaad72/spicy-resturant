<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Availability;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $availability = Availability::first();
        return view('admin.availability.index', compact('availability'));
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
        $availability = Availability::findOrFail($id);
        return view('admin.availability.edit', compact('availability'));
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
          'description' => 'required|max:255',
          'start_day' => 'required',
          'end_day' => 'required',
          'start_time' => 'required|date_format:H:i',
          'end_time' => 'required|date_format:H:i',
    		]);
        $requestData = $request->all();

        $availability = Availability::findOrFail($id);
        $availability->update($requestData);

        return redirect('admin/availability')->with('flash_message', 'Availability updated!');
    }


}
