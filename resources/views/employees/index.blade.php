<?php
/**
 * Created by PhpStorm.
 * User: gusta
 * Date: 26/03/2018
 * Time: 19:42
 */
?>

@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        <div class="col-lg-11">
            <table id="table" class="table table-striped">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th colspan="2">Action</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($arr_employees as $employee)
                    <tr>
                        <td>{{$employee['first_name']}}</td>
                        <td>{{$employee['last_name']}}</td>
                        <td>{{$employee['company']}}</td>
                        <td>{{$employee['email']}}</td>
                        <td>{{$employee['phone']}}</td>

                        <td>
                            <a href="{{action('EmployeeController@edit', $employee['id'])}}" class="btn btn-warning">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form id="delete" action="{{action('EmployeeController@destroy', $employee['id'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @php
                echo $employees->render();
            @endphp
        </div>
    </div>
@endsection