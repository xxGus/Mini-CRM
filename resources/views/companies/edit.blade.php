<?php
/**
 * Created by PhpStorm.
 * User: gusta
 * Date: 26/03/2018
 * Time: 23:22
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit company</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <h2>Edit company</h2><br  />
    <form method="post" action="{{action('CompanyController@update', $id)}}">
        @csrf
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
                <label for="number">Logo:</label>
                <input type="text" name="logo" value="{{$company->logo}}">
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
</body>
</html>
