@extends('layouts.dashboard')

@section('content')
<div class="header">
    <h1>Edit Employee</h1>
    <div class="actions">
        <a href="/employee">All Employees</a>
        <a class="view" href="/employee/{{$employee->id}}">Back to view</a>
        <form method="POST" action="/employee/{{$employee->id}}">
            @method('delete')
            @csrf
            <button class="actions_a delete">Delete</button>
        </form>
    </div>
</div>

@if(Session::get('status') ?? false == true)
<div class="notice success">
    Employee updated sucessfully
</div>
@endif

@if($errors->any())
<div class="notice errors">Employee update failed</div>
@endif

<form method="POST" action="/employee/{{$employee->id}}">
    @method("PATCH")
    @csrf
    <table class="form">
        <tbody>
            <tr>
                <th class='required'>First Name</th>
                <td>
                    <input type="text" name="first_name" value="{{$employee->first_name}}" />
                </td>
            </tr>
            <tr>
                <th class='required'>Last Name</th>
                <td>
                    <input type="text" name="last_name" value="{{$employee->last_name}}" />
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="text" name="email" value="{{$employee->email}}" /></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><input type="text" name="phone" value="{{$employee->phone}}" /></td>
            </tr>
            <tr>
                <th>Company</th>
                <td>
                    <select name='company_id'>
                        <option value='' disabled selected>None</option>
                        @foreach($companies as $company)
                        <option value='{{$company->id}}' {{$company->id == $employee->company_id ? "selected" : ''}}>{{$company->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <button type="submit">Update</button>

</form>
@stop