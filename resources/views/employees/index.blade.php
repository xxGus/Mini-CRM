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
    <title>Employees</title>
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
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th>Email</th>
            <th>Website</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($employees as $employee)
            <tr>
                <td>{{$employee['first_name']}}</td>
                <td>{{$employee['last_name']}}</td>
                <td>{{$employee['company_id']}}</td>
                <td>{{$employee['email']}}</td>
                <td>{{$employee['phone']}}</td>

                <td><a href="{{action('EmployeeController@edit', $employee['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('EmployeeController@destroy', $employee['id'])}}" method="post">
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
