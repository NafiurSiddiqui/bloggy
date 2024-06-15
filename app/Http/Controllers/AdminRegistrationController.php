<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminRegistrationController extends Controller
{
    public function create(): View
    {
        return view('admin.registration.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());

        //validate

        //create the db
    }
}
