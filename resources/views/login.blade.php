@extends('layouts.base')

@section('content')
<form action="{{url('login')}}" method="POST" class="flex-form">
    <h1>Login</h1>
    @csrf
    @if($errors->any())
    <div class="error">Login failed</div>
    @endif
    <label for="email">Email</label>
    <input type="email" name="email" />
    <label for="password">Password</label>
    <input type="password" name="password" />
    <button type="submit">Login</button>
    <a href=''>Forgot your password?</a>
</form>
@stop