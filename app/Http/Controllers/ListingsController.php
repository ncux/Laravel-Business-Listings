<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingsController extends Controller
{

    public function __construct()
    {
        // guard listing routes except the index and show routes
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $listings = Listing::orderBy('created_at', 'desc')->get();
        return view('listings/listings_all')->with('listings', $listings);
    }



    public function create()
    {
        return view('listings/create_listing');
    }



    public function store(Request $request)
    {
        // validate form input
        $this->validate($request, ['company'=>'required', 'email'=>'email']);

        // create and save listing
        $listing = new Listing;
        $listing->user_id = auth()->user()->id;
        $listing->name = $request->input('company');
        $listing->address = $request->input('address');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->bio = $request->input('bio');
        $listing->save();

        return redirect('/home')->with('success', 'New listing was successfully added!');

    }



    public function show($id)
    {
        $listing = Listing::find($id);
        return view('listings/listing')->with('listing', $listing);
    }



    public function edit($id)
    {
        $listing = Listing::find($id);

        // verify it's the right user
        if (auth()->user()->id !== $listing->user_id) {
            return redirect('/login')->with('error', 'Unauthorized!');
        }

        return view('listings/edit_listing')->with('listing', $listing);
    }



    public function update(Request $request, $id)
    {
        // validate form input
        $this->validate($request, ['company'=>'required', 'email'=>'email']);

        // update and save listing
        $listing = Listing::find($id);
        $listing->user_id = auth()->user()->id;
        $listing->name = $request->input('company');
        $listing->address = $request->input('address');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->bio = $request->input('bio');
        $listing->save();

        return redirect('/home')->with('success', 'Listing was successfully updated!');
    }



    public function destroy($id)
    {
        $listing = Listing::find($id);

        // verify it's the right user
        if (auth()->user()->id !== $listing->user_id) {
            return redirect('/login')->with('error', 'Unauthorized!');
        }

        $listing->delete();
        return redirect('/home')->with('success', 'Listing was successfully deleted!');

    }
}
