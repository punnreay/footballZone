<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //show all listings
    public function index()
    {
        return view('listings.index', [

            'listings' => Listing::latest()->filter(request(['search']))->simplePaginate(6)
        ]);
    }
    //show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show Create Form
    public function create()
    {
        return view('listings.create');
    }
    // Store Listing Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'fieldName' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'map' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('fieldPic')) {
            $formFields['fieldPic'] = $request->file('fieldPic')->store('fieldPics', 'public');
        }
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);
        return redirect('/');
    }

    // Show Edit Form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing)
    {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'fieldName' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'map' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('fieldPic')) {
            $formFields['fieldPic'] = $request->file('fieldPic')->store('fieldPics', 'public');
        }

        $listing->update($formFields);

        return back();
    }

    // Delete Listing
    public function destroy(Listing $listing)
    {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/');
    }
    // Manage Listings
    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()
            ->listings()->get()]);
    }
}
