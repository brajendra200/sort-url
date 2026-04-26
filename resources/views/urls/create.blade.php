@extends('layouts.app')

@section('content')

<h2>Create URL</h2>

<form method="POST" action="/urls">
    @csrf

    <input type="text" name="original_url" placeholder="Original URL" required>
    <br><br>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" style="background: cornflowerblue;">Create Sort URL</button>
</form>

@endsection
