<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Url;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // SuperAdmin Dashboard
        if ($user->role === 'SuperAdmin') {

            $totalCompanies = Company::count();
            $companies = Company::latest()->withCount([
                            'users as total_users',
                            'urls as total_urls'
                        ])->limit(5)->get();
            return view('dashboard.superadmin', compact('totalCompanies', 'companies'));
        }

        // Admin Dashboard
        if ($user->role === 'Admin') {
            //generate company users and urls lists

            $companyId = $user->company_id;
            $companyUsers = User::where('company_id', $companyId)
                ->whereIn('role', ['Member', 'Admin'])
                ->withCount([
                            'urls as total_urls'
                        ])
                ->latest()
                ->limit(5)
                ->get();

            $sortUrls = Url::where('company_id', $companyId)
                ->with('user:id,name')
                ->latest()
                ->limit(5)
                ->get();

            return view('dashboard.admin', compact('companyUsers', 'sortUrls'));

        }

        // Member Dashboard
        if ($user->role === 'Member') {
            $companyId = $user->company_id;

            $sortUrls = Url::where('company_id', $companyId)
                ->with('user:id,name')
                ->latest()
                ->limit(5)
                ->get();
            return view('dashboard.member', compact('sortUrls'));
        }



        abort(403);
    }

}
