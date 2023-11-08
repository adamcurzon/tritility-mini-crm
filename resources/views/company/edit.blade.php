@extends('layouts.dashboard')

@section('content')
<div class="header">
    <h1>Edit Company</h1>
    <div class="actions">
        <a href="/company">All Companies</a>
        <a class="view" href="/company/{{$company->id}}">Back to view</a>
        <form method="POST" action="/company/{{$company->id}}">
            @method('delete')
            @csrf
            <button class="actions_a delete">Delete</button>
        </form>
    </div>
</div>

@if(Session::get('status') ?? false == true)
<div class="notice success">
    Company updated sucessfully
</div>
@endif

@if($errors->any())
<div class="notice errors">Company update failed</div>
@endif

<form method="POST" action="/company/{{$company->id}}">
    @method("PATCH")
    @csrf
    <table class="form">
        <tbody>
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" name="name" value="{{$company->name}}" />
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input type="email" name="email" value="{{$company->email}}" />
                </td>
            </tr>
            <tr>
                <th>Logo</th>
                <td><input type="text" name="logo" value="{{$company->logo}}" /></td>
            </tr>
            <tr>
                <th>Website</th>
                <td><input type="text" name="website" value="{{$company->website}}" /></td>
            </tr>
        </tbody>
    </table>
    <button type="submit">Update</button>
</form>
@stop