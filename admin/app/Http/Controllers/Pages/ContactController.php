<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Contact;
use App\BasicDetail;
use App\BranchHead;
use App\ContactU;
use App\BranchBody;
use Auth;
use App\User;
// use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $basicDetail = BasicDetail::first();
        $contacts = ContactU::first();
        if (Auth::check()) {
          $user = User::findOrFail(Auth::user()->id);
          $bookings = $user->bookings->count();
        }else {
          $bookings = 0 ;
        }
        return view('pages.contact.index', compact('basicDetail' , 'contacts' , 'bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.contact.create');
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
          'fullName' => 'required|max:255',
          'email' => 'required|email|max:255|unique:contacts',
          'message' => 'required',
        ]);
        $requestData = $request->all();

        Contact::create($requestData);

        return redirect()->back()->with('flash_message', 'Contact added!');
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
        $basicDetail = BasicDetail::first();
        $contacts = ContactU::first();
        $branchHead = BranchHead::first();
        $branchBodies = BranchBody::all();
        if (Auth::check()) {
          $user = User::findOrFail(Auth::user()->id);
          $bookings = $user->bookings->count();
        }else {
          $bookings = 0 ;
        }
        return view('pages.contact.show', compact('basicDetail' , 'contacts' , 'branchHead' , 'branchBodies' , 'bookings'));
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
        $contact = Contact::findOrFail($id);

        return view('pages.contact.edit', compact('contact'));
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

        $contact = Contact::findOrFail($id);
        $contact->update($requestData);

        return redirect('pages/contact')->with('flash_message', 'Contact updated!');
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
        Contact::destroy($id);

        return redirect('pages/contact')->with('flash_message', 'Contact deleted!');
    }

    public function all(Request $request)
    {
      $keyword = $request->get('search');
      $perPage = 10;

      if (!empty($keyword)) {
          $contacts = Contact::where('name', 'LIKE', "%$keyword%")
              ->orWhere('email' , 'LIKE' , "%$keyword%")
              ->latest()->paginate($perPage);
      } else {
          $contacts = Contact::latest()->paginate($perPage);
      }

      return view('pages.contact.all', compact('contacts'));
    }
}
