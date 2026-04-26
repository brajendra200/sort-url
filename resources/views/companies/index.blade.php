@extends('layouts.app')

@section('content')

<h2>Companies</h2>

<a href="{{ route('companies.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded" style="background: cornflowerblue;">Create Company</a>

<br><br>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Users</th>
        <th>Generated URLs</th>
        <th>Hit URLs</th>
        <th>Created At</th>
    </tr>

    @forelse($companies as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->company_name }}<br>

                @foreach($company->users as $user)
                    <div>
                        {{ $user->name }} ({{ $user->email }}) - {{ $user->role }}
                    </div>
                @endforeach

            </td>
            <td>{{ $company->total_users }}</td>
            <td>{{ $company->total_urls }}</td>
            <td></td>
            <td>{{ $company->created_at->format('d-m-Y') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No companies found</td>
        </tr>
    @endforelse
    <br>



</table>

<br>

{{ $companies->links() }}

@endsection
