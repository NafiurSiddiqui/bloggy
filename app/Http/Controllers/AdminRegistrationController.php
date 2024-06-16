<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class AdminRegistrationController extends Controller
{
    public function create(): View
    {
        return view('admin.registration.create');
    }

    public function store(Request $request): RedirectResponse
    {

        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'author'

        ]);

        return redirect('/')->with('success', 'Your application has been submitted!');
    }

    public function approval(Request $request, User $user): RedirectResponse
    {
        //get the user id and status for ensurance, check the value of the button clicked.
        // dd($request->all());

        if ($request->input('submit_type') === 'approve') {

            $user->update(['status' => 'approved']);

            //launch an event, email user about the status

            return redirect('/admin')->with('success', 'Application approved!');
        } elseif ($request->input('submit_type') === 'reject') {
            $user->update(['status' => 'rejected']);

            //launch an event, email user about the status

            //delete user

            return redirect('/admin')->with('success', 'Application rejected!');
        } else {
            return redirect('/admin')->with('error', 'Invalid action!');
        }
        //if approved, update the user status to approved, else update to rejected
        //redirect back with a success message

    }
}
