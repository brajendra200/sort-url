@extends('layouts.app')

@section('content')

<h2>Create Company</h2>

<form method="POST" action="/companies">
    @csrf

    <input type="text" name="name" placeholder="Company Name" required>
    <br><br>

    <input type="email" name="email" placeholder="Admin Email" required>
    <br><br>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" style="background: cornflowerblue;">Create Company</button>
</form>

@endsection
