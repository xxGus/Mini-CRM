<?php
/**
 * Created by PhpStorm.
 * User: gusta
 * Date: 26/03/2018
 * Time: 19:42
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        <table id="table-company" class="table table-striped">
            <thead>
            <tr>
                <th>Logo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($companies as $company)
                <tr>
                    <td><img src="{{asset('storage/logos').'/'.$company['logo']}}" width="40px" alt=""></td>
                    <td>{{$company['name']}}</td>
                    <td>{{$company['email']}}</td>
                    <td>{{$company['website']}}</td>

                    <td><a href="{{action('CompanyController@edit', $company['id'])}}" class="btn btn-warning">Edit</a>
                    </td>
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
        @php
            echo $companies->render();
        @endphp
    </div>
@endsection
