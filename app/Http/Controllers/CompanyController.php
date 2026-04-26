<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class CompanyController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        if (auth()->user()->role !== 'SuperAdmin') {
            abort(403);
        }
        // SuperAdmin Dashboard
        if ($user->role === 'SuperAdmin') {

            $totalCompanies = Company::count();

            $companies = Company::latest()
                        ->withCount([
                            'users as total_users',
                            'urls as total_urls'
                        ])
                        ->with(['users' => function ($q) {
                            $q->select('id', 'company_id', 'name', 'email', 'role')
                            ->whereIn('role', ['Admin', 'Member']);
                        }])
                        ->paginate(10);

            return view('companies.index', compact('companies'));
        }
    }

    public function create()
    {
        // Only SuperAdmin allowed
        if (auth()->user()->role !== 'SuperAdmin') {
            abort(403);
        }

        return view('companies.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'SuperAdmin') {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        $company = Company::create([
            'company_name' => $request->name,
        ]);

        User::create([
            'name' => 'Client Admin',
            'email' => $request->email,
            'password' => Hash::make('password'), // default password
            'role' => 'Admin',
            'company_id' => $company->id
        ]);

        return redirect('/dashboard')->with('success', 'Company created');
    }
}
