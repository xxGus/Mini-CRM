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
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th colspan="2">Action</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td><img src="{{asset('storage/logos').'/'.$company['logo']}}" width="40px" alt=""></td>
                        <td>{{$company['name']}}</td>
                        <td>{{$company['email']}}</td>
                        <td>{{$company['website']}}</td>

                        <td><a href="{{action('CompanyController@edit', $company['id'])}}"
                               class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form id="delete" action="{{action('CompanyController@destroy', $company['id'])}}"
                                  method="post">
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
        </div>

            @php
                echo $companies->render();
            @endphp
    </div>
@endsection
