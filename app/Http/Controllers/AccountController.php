<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Make sure to import your Customer model

class AccountController extends Controller
{
    /**
     * Update the user's account information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = User::where('id', Auth::id())->first();
        $customer = Customer::where('user_id', Auth::id())->first();
        return view('user.userindex', compact(['user','customer']));
    }

    public function updateAccount(Request $request,$id)
    {
        $validatedData = $request->validate([
            'user_id'=>$id,
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'zipCode' => 'required|string',
            'phone_number' => 'required|string',
            'password' => 'nullable|string',
            'newPassword' => 'nullable|string|min:8|confirmed',
        ]);

        // Debugging to check validated data
//        dd($request);

        // Assuming authenticated user's ID is available
        $userId = Auth::user()->id;
        // Debugging to check flow before updateOrCreate
        // dd('Before updateOrCreate');

        // Update or create customer record
        $customer = Customer::find($userId);

        $customer = Customer::updateOrCreate(
            ['user_id' => $userId],
            [
                'user_id' => $userId,
                'firstName' => $validatedData['firstName'],
                'lastName' => $validatedData['lastName'],
//                'email' => $validatedData['email'],
                'address' => $validatedData['address'],
                'city' => $validatedData['city'],
                'zip_code' => $validatedData['zipCode'],
                'phone_number' => $validatedData['phone_number'],
                // Handle password update if necessary
//                 'password' => Hash::make($validatedData['password']), // Example of hashing new password
            ]
        );
//        dd($validatedData);
        $user = User::updateOrCreate(
            ['id' => $userId],
            [
                'id' => $userId,
               'name' => $validatedData['firstName'] . ' ' . $validatedData['lastName'],
               'email' => $validatedData['email'],
                // Handle password update if necessary
//                 'password' => Hash::make($validatedData['password']), // Example of hashing new password
            ]
        );

        // Debugging to check flow after updateOrCreate
        // dd('After updateOrCreate');

        // Optionally update user details if needed

        // Redirect back with success message
        return redirect()->back()->with('success', 'Account details updated successfully!');
    }
    /*public function updateAccount(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'zipCode' => 'required|string',
            'phone_number' => 'required|string',
            'currentPassword' => 'nullable|string',
            'newPassword' => 'nullable|string|min:8|confirmed',
        ]);

        // Debugging to check validated data
         dd($request);

        // Assuming authenticated user's ID is available
        $userId = auth()->user()->id;
        // Debugging to check flow before updateOrCreate
        // dd('Before updateOrCreate');

        // Update or create customer record
        $customer = Customer::updateOrCreate(
            ['user_id' => $userId],
            [
                'name' => $validatedData['firstName'] . ' ' . $validatedData['lastName'],
                'email' => $validatedData['email'],
                'address' => $validatedData['address'],
                'city' => $validatedData['city'],
                'zip_code' => $validatedData['zipCode'],
                'phone_number' => $validatedData['phone_number'],
                // Handle password update if necessary
                // 'password' => Hash::make($validatedData['newPassword']), // Example of hashing new password
            ]
        );

        // Debugging to check flow after updateOrCreate
        // dd('After updateOrCreate');

        // Optionally update user details if needed

        // Redirect back with success message
        return redirect()->back()->with('success', 'Account details updated successfully!');
    }*/




}
