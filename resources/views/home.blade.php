@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (Route::has('login'))
                    @auth
                        <div class="content">
                            <div class="title">
                                Mini-CRM
                            </div>
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </div>
@endsection
