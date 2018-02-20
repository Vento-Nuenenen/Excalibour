@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form method="POST" action="{{ route('print') }}">
                                {!! csrf_field() !!}

                                <div class="form-group col-sm-10 col-sm-offset-1 has-feedback row {{ $errors->has('certificate_text') ? ' has-error ' : '' }}">
                                    <textarea class="form-control" rows="10" name="certificate_text" id="certificate_text">

                                    </textarea>
                                </div>

                                <div class="form-group row col-md-offset-1">
                                    <button type="submit" class="btn btn-success col-md-2"><i class='fa fa-fw fa-save' aria-hidden='true'></i> Drucken</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
