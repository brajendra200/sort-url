@extends('layouts.app')

@section('content')

<h2>Urls Listing</h2>

<a href="{{ route('urls.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded" style="background: cornflowerblue;">Create Urls</a>

<br><br>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Sort Url</th>
        <th>Long Url</th>
        <th>Hits</th>
        <th>Craeted By</th>
        <th>Created On</th>
    </tr>

    @forelse($companyUrls as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ url('/r/' . $company->short_code) }}</td>
            <td>{{ $company->original_url }}</td>
            <td></td>
            <td>{{ $company->user->name }}</td>
            <td>{{ $company->created_at->format('d-m-Y') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No Url found</td>
        </tr>
    @endforelse
    <br>



</table>

<br>
{{ $companyUrls->links() }}

@endsection
