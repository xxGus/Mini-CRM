<?php
/**
 * Created by PhpStorm.
 * User: gusta
 * Date: 26/03/2018
 * Time: 23:22
 */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit company</h2><br/>
        <form method="post" action="{{action('CompanyController@update', $id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$company->name}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{$company->email}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <img src="{{asset('storage/logos').'/'.$company->logo}}" width="100px" style="margin-bottom: 15px"><br>
                    <label for="logo">Logo:</label>
                    <input type="file" name="logo">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="website">Website:</label>
                    <input type="text" class="form-control" name="website" value="{{$company->website}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
