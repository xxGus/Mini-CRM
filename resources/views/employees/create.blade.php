<?php
/**
 * Created by PhpStorm.
 * User: gusta
 * Date: 26/03/2018
 * Time: 19:43
 */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create new employee</h2><br/>
        <form method="post" action="{{url('employees')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="first-name">First Name:</label>
                    <input type="text" class="form-control" name="first_name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="last-name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="company">Company</label>
                    <input type="number" class="form-control" name="company_id">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" name="phone">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
