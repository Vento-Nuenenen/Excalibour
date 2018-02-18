@extends('layouts.app')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                @include('panels.welcome-panel')

            </div>
        </div>
    </div>

@endsection