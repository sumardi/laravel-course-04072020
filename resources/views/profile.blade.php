@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Profile</h1>
    <p>Name : {{ $user->name }}</p>
    <p>Email : {{ $user->email }}</p>
    <p>Registered : {{ $user->created_at }}</p>
</div>
@endsection