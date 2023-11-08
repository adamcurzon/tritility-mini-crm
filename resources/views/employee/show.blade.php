@extends('layouts.dashboard')

@section('content')
<div class="header">
    <h1>View Employee</h1>
    <div class="actions">
        <a href="/employee">All Employees</a>
        <a class="edit" href="/employee/{{$employee->id}}/edit">Edit</a>
    </div>
</div>

@if(Session::get('created') ?? false == true)
<div class="notice success">
    Employee created sucessfully
</div>
@endif

<table class="form">
    <tbody>
        <tr>
            <th>First Name</th>
            <td>{{$employee->first_name}}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{$employee->last_name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$employee->email}}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{$employee->phone}}</td>
        </tr>
        <tr>
            <th>Company</th>
            <td>
                @if(isset($employee->company->name))
                <a href='/company/{{$employee->company->id}}'>{{$employee->company->name}}</a>
                @else
                None
                @endif
            </td>
        </tr>
    </tbody>
</table>
@stop