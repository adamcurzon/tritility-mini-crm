@extends('layouts.dashboard')

@section('content')
<div class="header">
    <h1>New Company</h1>
    <div class="actions">
        <a href="/company">All Companies</a>
    </div>
</div>

@if($errors->any())
<div class="notice errors">Company creation failed</div>
@endif

<form method="POST" action="/company">
    @csrf
    <table class="form">
        <tbody>
            <tr>
                <th class='required'>Name</th>
                <td>
                    <input type="text" name="name" value="{{ old('name') }}" />
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input type=" email" name="email" value="{{ old('email') }}" />
                </td>
            </tr>
            <tr>
                <th>Logo</th>
                <td><input type=" text" name="logo" value="{{ old('logo') }}" />
                </td>
            </tr>
            <tr>
                <th>Website</th>
                <td><input type="text" name="website" value="{{ old('website') }}" /></td>
            </tr>
        </tbody>
    </table>
    <button type="submit">Create</button>
</form>
@stop