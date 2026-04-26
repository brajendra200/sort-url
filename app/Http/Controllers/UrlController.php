<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Url;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role === 'SuperAdmin') {
            $sortUrls = Url::latest()->with('user')->paginate(10);
            //return view('dashboard.admin', compact('sortUrls'));
        } else {
            $companyUrls = Url::where('company_id', $user->company_id)->latest()->with('user')->paginate(10);
            return view('urls.index', compact('companyUrls'));
        }
    }

    public function create()
    {

        $user = auth()->user();
        // not  SuperAdmin allowed
        if ($user->role == 'SuperAdmin') {
            abort(403);
        }

        return view('urls.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->role == 'SuperAdmin') {
            abort(403);
        }
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $shortCode = Str::random(6);

        // 💾 Save
        Url::create([
            'original_url' => $request->original_url,
            'short_code'   => $shortCode,
            'user_id'      => $user->id,
            'company_id'   => $user->company_id
        ]);

        return redirect('/urls')->with('success', 'Short URL created');
    }

    public function redirect($code)
    {
        $url = Url::where('short_code', $code)->first();

        if (!$url) {
            abort(404);
        }

        return redirect($url->original_url);
    }
}
