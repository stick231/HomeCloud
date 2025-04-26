@extends('layouts.auth')

@section('content')
<h1>Check Email</h1>
<form method="POST" action="">{{-- {{ route('check.email') }}--}}
  @csrf
  <input type="text" name="code" placeholder="Enter code" required>
  <button type="submit">Verify</button>
</form>
<p>Please check your email for the verification code.</p>
@endsection
