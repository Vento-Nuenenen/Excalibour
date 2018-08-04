@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                <div class="input-group" id="adv-search">
                    <input type="text" class="form-control" placeholder="Suche" />
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary">
                            <span class="fa fa-search"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card ExerOne mb-3">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Erst Exer
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent=".ExerOne">
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <th>
                            Test
                        </th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                Data
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card ExerTwo">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Zweit Exer
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent=".ExerTwo">
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <th>
                            Test
                        </th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                Data
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
