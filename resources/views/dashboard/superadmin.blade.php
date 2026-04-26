@extends('layouts.app')

@section('content')


<h1>Total Companies: {{ $totalCompanies }}</h1>


<a href="/companies/create" class="bg-blue-500 text-white px-4 py-2 rounded" style="background: cornflowerblue;">Create Company</a>
@if($totalCompanies > 0)

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Users</th>
        <th>Generated URLs</th>
        <th>Hit URLs</th>
    </tr>

    @foreach($companies as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->company_name }}</td>
            <td>{{ $company->total_users }}</td>
            <td>{{ $company->total_urls }}</td>
            <td></td>
        </tr>
    @endforeach
</table>
<br><br>
<a href="/companies" class="bg-blue-500 text-white px-4 py-2 rounded" style="background: cornflowerblue;">View More Companies</a><br><br>
@endif
@endsection
