<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;
use App\Models\Url;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role !== 'Admin') {
            abort(403);
        }
        $companyId = $user->company_id;
        $companyUsers = User::where('company_id', $companyId)
            ->whereIn('role', ['Member', 'Admin'])
            ->withCount([
                        'urls as total_urls'
                    ])
            ->latest()
            ->paginate(10);
        return view('users.index', compact('companyUsers'));

    }

    public function create()
    {
        $user = auth()->user();
        if ($user->role !== 'Admin') {
            abort(403);
        }

        return view('users.create');
    }

    public function store(Request $request)
    {
        $authUser = auth()->user();

        if ($authUser->role !== 'Admin') {
            abort(403);
        }

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role'  => 'required|in:Member,Sales,Manager'
        ]);

        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make('password'), // default
            'role'       => $request->role,
            'company_id' => $authUser->company_id
        ]);

        return redirect()->back()->with('success', 'User created successfully');
    }

}
