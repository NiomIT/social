<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subcategory;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => 'nullable|string|max:255|unique:users,username',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'subcategory_name' => 'nullable|string|max:255',
            'city_id' => 'nullable|string|max:255',
            'area_id' => 'nullable|string|max:255',
            'house_no' => 'nullable|string|max:255',
            'road_no' => 'nullable|string|max:255',
        ]);

        $subcategory = $request->subcategory_id ?? $request->subcategory_name;

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Create the user
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Encrypt the password
        $user->photo = $photoPath;
        $user->category_id = $request->category_id;

        // Check if the subcategory is an ID or a new name
        if (is_numeric($subcategory)) {
            $user->subcategory_id = $subcategory;
            $user->subcategory_name = null;
        } else {
            $user->subcategory_name = $subcategory;
            $user->subcategory_id = null;
        }

        $user->city_id = $request->city_id;
        $user->area_id = $request->area_id;
        $user->house_no = $request->house_no;
        $user->road_no = $request->road_no;
        $user->save();

        // If subcategory name was provided, create a new subcategory record
        if ($request->subcategory_name) {
            $newSubcategory = new Subcategory();
            $newSubcategory->category_id = $request->category_id;
            $newSubcategory->subcategory_name = $request->subcategory_name;
            $newSubcategory->slug =  preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->subcategory_name)));
            $newSubcategory->status = 0;
            $newSubcategory->save();

            // Update user's subcategory_id with the newly created subcategory's ID
            $user->subcategory_id = $newSubcategory->id;
            $user->save();
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

}
