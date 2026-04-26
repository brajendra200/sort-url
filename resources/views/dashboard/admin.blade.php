@extends('layouts.app')

@section('content')


<h1>Generated URLs: {{ $sortUrls->count() }}</h1><br>
<a href="/urls/create" class="bg-blue-500 text-white px-4 py-2 rounded" style="background: cornflowerblue;">Click here to Generate URL</a>
@if($sortUrls->count() > 0)

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Short Url</th>
        <th>Long Url</th>
        <th>Created By</th>
        <th>Created On</th>
    </tr>

    @foreach($sortUrls as $sortUrl)
        <tr>
            <td>{{ $sortUrl->id }}</td>
            <td>{{ url('/r/' . $sortUrl->short_code) }}</td>
            <td>{{ $sortUrl->original_url }}</td>
            <td>{{ $sortUrl->user->name }}</td>
            <td>{{ $sortUrl->created_at }}</td>
        </tr>
    @endforeach
</table>
<br><br>
<a href="/urls" class="bg-blue-500 text-white px-4 py-2 rounded" style="background: cornflowerblue;">View More Urls</a><br><br>
@endif
<hr>
<h1>Team members: {{ $companyUsers->count() }}</h1><br>
<a href="/users/create" class="bg-blue-500 text-white px-4 py-2 rounded" style="background: cornflowerblue;">Add Team Member</a>
@if($companyUsers->count() > 0)

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Generated URLs</th>
        <th>Hit URLs</th>

    </tr>

    @foreach($companyUsers as $companyUser)
        <tr>
            <td>{{ $companyUser->id }}</td>
            <td>{{ $companyUser->name }}</td>
            <td>{{ $companyUser->email }}</td>
            <td>{{ $companyUser->role }}</td>
            <td>{{ $companyUser->total_urls }}</td>
            <td></td>
        </tr>
    @endforeach
</table>
<br><br>
<a href="/users" class="bg-blue-500 text-white px-4 py-2 rounded" style="background: cornflowerblue;">View More Users</a><br><br>
@endif
@endsection
