@extends('layouts.dashboard')

@section('content')
<h1>Company</h1>
<a href="/company">Back to all Companies</a>

<table>
    <thead>
        <th>Name</th>
        <th>Email</th>
    </thead>
    <tbody>
        <tr>
            <td>{{$company->name}}</td>
            <td>{{$company->email}}</td>
        </tr>
    </tbody>
</table>

<h2>Employees</h2>
<table>
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
        <tr>
            <td>{{$employee->first_name}}</td>
            <td>{{$employee->last_name}}</td>
            <td>
                <a href="/employee/{{$employee->id}}">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop