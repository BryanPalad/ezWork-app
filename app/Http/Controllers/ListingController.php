<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // SHOW ALL LISTINGS
    public function index(){
        // get the folder index.blade.php under views\listings
        return view('listings.index', [
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
            'listings' => Listing::latest()->filter(request(['tag', 'searchjob', 'searchlocation']))->paginate(7)
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(6)
        ]);
    }

    // SHOW SINGLE LISTING
    public function show(Listing $listing){
        // get the folder show.blade.php under views\listings
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // SHOW CREATE FORM
    public function create(){
        return view('listings.create');
    }

    // STORE LISTING DATA
    public function store(Request $request){
        // for form validations 
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            // store the file uploaded in logos folder (storage->app-public)
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        // also store the user_id of the logged in user to the listings data
        $formFields['user_id'] = auth()->id();
        
        // dispatch all fields from the object formfields to the model create.
        Listing::create($formFields);

        // option for success message
        // Session::flash('message', 'Listing Created');

        // if all fields completed redirect to the homepage.
        // return redirect('/')->with('success', 'Listing created successfully');
        return redirect('/')->with('message', 'Listing created successfully');
    }

    // SHOW EDIT FORM
    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    // UPDATE LISTING DATA
    public function update(Request $request, Listing $listing){

        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        // for form validations 
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            // store the file uploaded in logos folder (storage->app-public)
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        // dispatch all fields from the object formfields to the model create.
        $listing->update($formFields);

        // option for success message
        // Session::flash('message', 'Listing Created');

        // if all fields completed redirect to the homepage.
        // return redirect('/')->with('success', 'Listing created successfully');
        return back()->with('message', 'Job post updated successfully');
    }

    // DELETE LISTING DATA
    public function destroy(Listing $listing){
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Job post deleted successfully');
    }

    // MANAGE LISTINGS
    public function manage(){
        // this should get all the currently logged in users listings and pass them into manage page
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
