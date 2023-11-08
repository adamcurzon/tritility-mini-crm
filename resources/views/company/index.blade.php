@extends('layouts.dashboard')

@section('content')

@if(Session::get('deleted') ?? false == 'deleted')
<div class="notice errors">
    Company sucessfully deleted
</div>
@endif

<div class="header">
    <h1>All Companies</h1>
    <div class="actions">
        <a class="view" href="/company/create">Add Company</a>
    </div>
</div>

<table>
    <thead>
        <th>Name</th>
        <th>Email</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($companies as $company)
        <tr>
            <td>{{$company->name}}</td>
            <td>{{$company->email}}</td>
            <td>
                <a class='actions_a' href="/company/{{$company->id}}">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="actions">
    <a class="view" href='/company?pages={{ ($_GET["pages"] ?? 1) + 1 }}'>Load More</a>
</div>
@stop