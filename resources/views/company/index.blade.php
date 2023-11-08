@extends('layouts.dashboard')

@section('content')
<h1>Companies</h1>

<table>
    <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach ($companies as $company)
        <tr>
            <td>{{$company->name}}</td>
            <td>{{$company->email}}</td>
            <td>
                <a href="/company/{{$company->id}}">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<button>Load More</button>
@stop