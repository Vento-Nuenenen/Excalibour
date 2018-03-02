@extends('layouts.app')

@section('template_title')
	Siehe Nachricht
@endsection

@section('content')

 <div class="container">
	<div class="row">
	    <div class="col-md-12">
			 @include('partials.form-status')
        </div>
    </div>
</div>

@endsection