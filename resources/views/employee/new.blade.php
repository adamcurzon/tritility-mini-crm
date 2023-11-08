@extends('layouts.dashboard')

@section('content')
<div class="header">
    <h1>New Employee</h1>
    <div class="actions">
        <a href="/employee">All Employees</a>
    </div>
</div>

@if($errors->any())
<div class="notice errors">Employee create failed</div>
@endif

<form method="POST" action="/employee">
    @csrf
    <table class="form">
        <tbody>
            <tr>
                <th class='required'>First Name</th>
                <td>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" />
                </td>
            </tr>
            <tr>
                <th class='required'>Last Name</th>
                <td>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" />
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="text" name="email" value="{{ old('email') }}" /></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><input type="text" name="phone" value="{{ old('phone') }}" /></td>
            </tr>
            <tr>
                <th>Company</th>
                <td>
                    <select name='company_id'>
                        <option value='' disabled selected>None</option>
                        @foreach($companies as $company)
                        <option value='{{$company->id}}'>{{$company->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <button type="submit">Create</button>
</form>
@stop