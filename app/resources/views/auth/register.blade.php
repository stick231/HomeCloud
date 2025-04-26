@extends('layouts.auth')

@section('content')
<h1>Register</h1>
<form method="POST" action="{{ route('auth.register') }}">{{--{{ route('register') }} --}}
  @csrf
  <input type="text" name="name" placeholder="Name" required>
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Password" required>
  <input type="password" name="password_confirmation" placeholder="Repeat password" required>
  <button type="submit">Submit</button>
</form>
@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
@endsection