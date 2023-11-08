@extends('layouts.dashboard')

@section('content')

@if(Session::get('deleted') ?? false == 'deleted')
<div class="notice errors">
    Employee sucessfully deleted
</div>
@endif

<div class="header">
    <h1>All Employees</h1>
    <div class="actions">
        <a class="view" href="/employee/create">Add Employee</a>
    </div>
</div>

<table>
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
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
<div class="actions">
    <a class="view" href='/employee?pages={{ ($_GET["pages"] ?? 1) + 1 }}'>Load More</a>
</div>
@stop