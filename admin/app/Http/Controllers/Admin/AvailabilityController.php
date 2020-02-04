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
    			'title' => 'required',
          'description' => 'required',
          'start_date' => 'required|date_format:Y-m-d H:i:s|after_or_equal:today',
          'end_date' => 'required|date_format:Y-m-d H:i:s|after:start_date',
    		]);
        $requestData = $request->all();

        $availability = Availability::findOrFail($id);
        $availability->update($requestData);

        return redirect('admin/availability')->with('flash_message', 'Availability updated!');
    }


}
