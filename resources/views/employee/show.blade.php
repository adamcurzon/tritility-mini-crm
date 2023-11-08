@extends('layouts.dashboard')

@section('content')
<h1>Employee</h1>
<a href="/employee">Back to all Employees</a>
<table>
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
    </thead>
    <tbody>
        <td>{{$employee->first_name}}</td>
        <td>{{$employee->last_name}}</td>
        </tr>
    </tbody>
</table>
@stop