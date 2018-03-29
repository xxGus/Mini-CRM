<?php
/**
 * Created by PhpStorm.
 * User: gusta
 * Date: 27/03/2018
 * Time: 21:23
 */
?>

        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit employee</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <h2>Edit employee</h2><br/>
    <form method="post" action="{{action('EmployeeController@update', $employee)}}">
        @csrf
        <?php var_dump($employee->id);?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value="{{$employee->first_name}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="company">Company</label>
                <input type="number" class="form-control" name="company_id" value="{{$employee->company_id}}">

            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Email">Email:</label>
                <input type="text" class="form-control" name="email" value="{{$employee->email}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" name="phone" value="{{$employee->phone}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

