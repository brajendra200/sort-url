@extends('layouts.app')

@section('content')

<h2>Invite User</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Name" required>
    <br><br>

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <select name="role" required>
        <option value="">Select Role</option>
        <option value="Member">Member</option>
        <option value="Admin">Admin</option>

    </select>

    <br><br>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" style="background: cornflowerblue;">Invite User</button>
</form>

@endsection
