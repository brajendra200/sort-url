@extends('layouts.app')

@section('content')

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
