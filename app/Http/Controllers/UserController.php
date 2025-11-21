<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150|unique:users,email,' . $user->id,
            'phone' => ['required', 'regex:/^09\d{9}$/'],
            'address' => 'required|string|max:255',
            'course' => 'required|string|   max:100',
            'graduation_year' => ['required', 'digits:4', 'integer', 'min:2000', 'max:' . date('Y')],
            'bio' => 'required|string'
        ], [
            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Phone number must be exactly 11 digits and start with 09.',
            'address.required' => 'Address is required.',
            'course.required' => 'Course is required.',
            'graduation_year.required' => 'Graduation year is required.',
            'graduation_year.digits' => 'Graduation year must be 4 digits.',
            'graduation_year.min' => 'Graduation year cannot be before 2000.',
            'graduation_year.max' => 'Graduation year cannot be in the future.',
            'bio.required' => 'Bio is required.'
        ]);
        
        try {

            $phone = preg_replace('/[^0-9]/', '', $request->phone);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $phone,
                'address' => $request->address,
                'course' => $request->course,
                'graduation_year' => $request->graduation_year,
                'bio' => $request->bio
            ]);

            return back()->with('success', 'Profile updated successfully!');

        } catch (\Exception $e) {

            \Log::error('Profile update failed: ' . $e->getMessage());

            return back()->with('error', $e->getMessage());

        }
    }


}
