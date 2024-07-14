<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
//        dd($users);
        return view('users.userList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $file = $request->file('userImage');
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone_number = $request->phone_number;
        $users->address = $request->address;
        $users->image = $file->getClientOriginalName();

        $destinationPath = 'storage'; //upload path
        $file->move($destinationPath,$file->getClientOriginalName());

        $users->save();
        return redirect('user/create')->with('success', 'New User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        auth()->user()->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('password.change')->with('success', 'Password successfully changed!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
//        dd($user);
        return view('users.userEdit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        // Validate the request data as needed
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'address' => 'required|string|max:255',
        ]);

        // Update the user with the new data
        $user->update($request->all());

        // Redirect back to the user list or wherever you want
        return redirect()->back()->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Delete the user
        $user->delete();

        // Redirect back to the user list or wherever you want
        return redirect()->back()->with('success', 'User deleted successfully!');
    }
    public function user() {
        return view('userindex');
    }
}


