<?php
/**
 * Created by PhpStorm.
 * User: gusta
 * Date: 26/03/2018
 * Time: 19:42
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Companies</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($companies as $company)
            <tr>
                <td>{{$company['name']}}</td>
                <td>{{$company['email']}}</td>
                <td>{{$company['website']}}</td>

                <td><a href="{{action('CompanyController@edit', $company['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('CompanyController@destroy', $company['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
