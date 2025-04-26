@extends('layouts.auth')

@section('content')
<h1>Login</h1>
<form method="POST" action="{{ route('auth.login') }}">
  @csrf
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit">Login</button>
</form>
<p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
@endsection
