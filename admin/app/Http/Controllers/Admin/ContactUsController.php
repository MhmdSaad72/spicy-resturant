<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ContactU;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $contactus = ContactU::first();
        return view('admin.contact-us.index', compact('contactus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.contact-us.create');
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
        $contactus = ContactU::findOrFail($id);

        return view('admin.contact-us.edit', compact('contactus'));
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
          'form_title' => 'required',
          'form_content' => 'required',
          'form_description' => 'required',
          'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
          'place' => 'required',
          'address' => 'required',
          'map_directions' => 'url',
          'facebook' => 'url',
          'twitter' => 'url',
          'youtube' => 'url',
          'instagram' => 'url',
        ]);

        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                                            ->store('uploads', 'public');
        }

        $contactus = ContactU::findOrFail($id);
        $contactus->update($requestData);

        return redirect('admin/contact-us')->with('flash_message', 'ContactU updated!');
    }
}
