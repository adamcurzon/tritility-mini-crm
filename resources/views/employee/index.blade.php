@extends('layouts.dashboard')

@section('content')
<h1>Employees</h1>

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
<button>Load More</button>
@stop