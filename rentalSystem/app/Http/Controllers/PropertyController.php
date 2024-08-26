<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use App\Models\PropertyPhoto;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function updateBookingStatus(Request $request,string $id)
    {

        $booking = Booking::findOrFail($id);
        $booking->status = $request->input('status');
        
        $booking->save();

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }
    public function showprof()
    {
        // Get the authenticated user's details
        $user = auth()->user(); // This fetches the authenticated user's data

        // Retrieve bookings for properties owned by the authenticated user
        $bookings = Booking::whereHas('property', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        // Pass both $user and $bookings to the view
        return view('frontend.admin.sprofile', compact('user', 'bookings'));
    }

    public function supdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min=8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $user = auth()->user();

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password,
        ]);

        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->update(['profile_picture' => $profilePicturePath]);
        }

        return redirect()->route('sprofile.page')->with('success', 'Profile updated successfully!');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve properties that belong to the authenticated user and their related bookings
        $properties = Property::with('bookings')
            ->where('user_id', auth()->user()->id)
            ->get();

        // Retrieve bookings that are related to the properties owned by the authenticated user
        $bookings = Booking::whereHas('property', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();

        // Pass the filtered properties and bookings to the view
        return view('frontend.admin.property_index', compact('properties', 'bookings'));
    }




    public function showReviews()
    {       $bookings = Booking::whereHas('property', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
        // Get the properties owned by the authenticated user
        $properties = Property::where('user_id', Auth::id())->pluck('id');

        // Fetch reviews where property_id matches the user's properties
        $reviews = Review::whereIn('property_id', $properties)->get();

        return view('frontend.admin.sreview', compact('reviews', 'bookings'));
    }


    /**
     * Show the form for creating a new resource or editing an existing one.
     */
    public function manage(Property $property = null)
    {  $bookings = Booking::all();
        $properties = Property::all();
        return view('frontend.admin.property_admin', compact('properties', 'property','bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price_per_day' => 'required|numeric',
            'availability' => 'boolean',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (auth()->id()) {
            $property = Property::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'description' => $request->description,
                'address' => $request->address,
                'location' => $request->location,
                'price_per_day' => $request->price_per_day,
                'availability' => $request->has('availability') ? $request->availability : true,
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('property_photos', 'public');
                    PropertyPhoto::create([
                        'property_id' => $property->id,
                        'photo_url' => $path,
                    ]);
                }
            }

            return redirect()->route('property.index')->with('success', 'Property created successfully.');
        } else {
            return redirect()->route('property.index')->withErrors('Error', 'Cannot create property. You need to log in.');
        }
    }
    public function indexbooking()
    {
        // Retrieve bookings that are related to properties owned by the authenticated user, with eager loading for property and renter relationships
        $bookings = Booking::with(['property', 'renter'])
            ->whereHas('property', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->get();

        // Pass the filtered bookings data to the view
        return view('frontend.admin.dashboardB', compact('bookings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price_per_day' => 'required|numeric',
            'availability' => 'boolean',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $property->update($request->only([
            'title',
            'description',
            'address',
            'location',
            'price_per_day',
            'availability'
        ]));

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('property_photos', 'public');
                PropertyPhoto::create([
                    'property_id' => $property->id,
                    'photo_url' => $path,
                ]);
            }
        }

        return redirect()->route('property.index')->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('property.admin')->with('success', 'Property deleted successfully.');
    }


    // Fetching data for home page
    public function home()
    {
        $properties = Property::with(['user', 'amenities'])->paginate(6);
        return view('frontend.home', compact('properties'));
    }

    // Data for one property
    public function property(string $id)
    {
        $property = Property::with('user')->findOrFail($id);
        $countOfReview = Review::where('property_id', $id)->count();
        $reviews = Review::with('renter')->where('property_id', $id)->get();

        return view('frontend.property-details', compact('property', 'countOfReview', 'reviews'));
    }
    // listing all property
    public function AllProperty( Request $request )
    {
        $location = $request->input('location');
        $search = $request->input('search');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $availability = $request->input('availability');

        $query = Property::with(['user', 'amenities']);

        // Filter by location if provided
        if ($location) {
            $query->where('location', '=', $location);
        }

        // Filter by search term if provided
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }
        if ($availability !== null && $availability !== '') {
    $query->where('availability', '=', $availability);
}

        // Filter by price range if both min and max prices are provided
        if ($minPrice !== null && $maxPrice !== null) {
            $query->whereBetween('price_per_day', [$minPrice, $maxPrice]);
        }

        // Execute the query and get the results
        $properties = $query->get();

        // Return the properties to the view
        return view('frontend.property', compact('properties'));
    }

    public function addComment(Request $request, $id)
    {
        $validatedData = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'renter_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        if (auth()->id()) {
            $review = new Review();
            $review->property_id = $validatedData['property_id'];
            $review->renter_id = $validatedData['renter_id'];
            $review->rating = $validatedData['rating'];
            $review->comment = $validatedData['comment'];
            $review->save();

            return redirect()->route('viewProperty', $id)->with('success', 'Review submitted successfully!');
        } else {
            return redirect()->route('viewProperty', $id)->with('commentError', 'You need to craete account or Login to add a comment.');
        }
    }

}
