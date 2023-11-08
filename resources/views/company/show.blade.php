@extends('layouts.dashboard')

@section('content')
<div class="header">
    <h1>View Company</h1>
    <div class="actions">
        <a href="/company">All Companies</a>
        <a class="edit" href="/company/{{$company->id}}/edit">Edit</a>
    </div>
</div>
<table class="form">
    <tbody>
        <tr>
            <th>Name</th>
            <td>{{$company->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$company->email}}</td>
        </tr>
        <tr>
            <th>Logo</th>
            <td>{{$company->logo}}</td>
        </tr>
        <tr>
            <th>Website</th>
            <td>{{$company->website}}</td>
        </tr>
        </tr>
    </tbody>
</table>

<h2>Employees</h2>
@if($company->employee->isEmpty())
<div class="error">No employees found</div>
<br />
<div class="actions">
    <a class="view" href="/employee/create">Add Employee</a>
</div>
@else
<table>
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach ($company->employee as $employee)
        <tr>
            <td>{{$employee->first_name}}</td>
            <td>{{$employee->last_name}}</td>
            <td>
                <a class='actions_a' href="/employee/{{$employee->id}}">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@stop