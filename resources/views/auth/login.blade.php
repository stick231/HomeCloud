@extends('layouts.auth')

@section('content')
<h1>Login</h1>
<form method="POST" action="{{ route('auth.login') }}">
  @csrf
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit">Login</button>
</form>
@error('email')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@enderror
<p>Don't have an account? <a href="{{ route('auth.register.form') }}">Register</a></p>
@endsection
