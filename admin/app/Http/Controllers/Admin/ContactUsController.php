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
          'title' => 'required|max:255',
          'description' => 'required|max:255',
          'content' => 'required|max:65535',
          'form_title' => 'required|max:255',
          'form_content' => 'required|max:65535',
          'form_description' => 'required|max:255',
          'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
          'place' => 'required|max:255',
          'address' => 'required|max:255',
          'map_directions' => 'nullable|url|max:255',
          'facebook' => 'nullable|url|max:255',
          'twitter' => 'nullable|url|max:255',
          'youtube' => 'nullable|url|max:255',
          'instagram' => 'nullable|url|max:255',
          'map_directions' => 'nullable|url|max:255',
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
