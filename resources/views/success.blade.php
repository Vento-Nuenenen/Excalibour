@extends('layouts.app')

@section('content')

<div class="container">
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
                            Name
                        </th>
                        <th>
                            Abteilung
                        </th>
                        <th>
                            Posten bestanden
                        </th>
                        <th>
                            Punkte total
                        </th>
                        <th>
                            Status
                        </th>
                    </thead>
                    <tbody>
                        @foreach($first as $participation)
                            <tr>
                                <td>
                                    @if($participation->scout_name)
                                        {{ $participation->scout_name }} / {{ $participation->first_name }} {{ $participation->last_name }}
                                    @else
                                        {{ $participation->first_name }} {{ $participation->last_name }}
                                    @endif
                                </td>
                                <td>
                                    {{ $participation->group_name }}
                                </td>
                                <td>
                                    @if($participation->fields[0] != "")
                                        @for($i = 0; $i < count($participation->fields); $i++)
                                            @if((int) $participation->points[$i] >= floor((int) $participation->maxpoints[$i] / 2))
                                                <span class="badge badge-success"> {{ $participation->fields[$i] }} ({{ $participation->points[$i] }} / {{ $participation->maxpoints[$i] }}) </span>
                                            @elseif(isset($participation->points[$i]) && (int) $participation->points[$i] < floor((int) $participation->maxpoints[$i] / 2))
                                                <span class="badge badge-danger"> {{ $participation->fields[$i] }} ({{ $participation->points[$i] }} / {{ $participation->maxpoints[$i] }}) </span>
                                            @endif
                                        @endfor
                                    @endif
                                </td>
                                <td>
                                    @if($participation->reached_points != null)
                                        @if($participation->reached_points < env('POINTS_TO_PASS'))
                                            <span class="badge badge-danger">{{ $participation->reached_points }} / {{$max_points}}</span>
                                        @else
                                            <span class="badge badge-success">{{ $participation->reached_points }} / {{$max_points}}</span>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if($participation->fields[0] != "")
                                        @php($success = true)

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
							Name
						</th>
						<th>
							Abteilung
						</th>
						<th>
							Posten bestanden
						</th>
						<th>
							Punkte total
						</th>
						<th>
							Status
						</th>
						</thead>
						<tbody>
						@foreach($first as $participation)
							<tr>
								<td>
									@if($participation->scout_name)
										{{ $participation->scout_name }} / {{ $participation->first_name }} {{ $participation->last_name }}
									@else
										{{ $participation->first_name }} {{ $participation->last_name }}
									@endif
								</td>
								<td>
									{{ $participation->group_name }}
								</td>
								<td>
									@for($i = 0; $i < count($participation->fields); $i++)
										@if((int) $participation->points[$i] > floor((int) $participation->maxpoints[$i] / 2))
											<span class="badge badge-success"> {{ $participation->fields[$i] }} ({{ $participation->points[$i] }} / {{ $participation->maxpoints[$i] }}) </span>
										@elseif((int) $participation->points[$i] < floor((int) $participation->maxpoints[$i] / 2))
											<span class="badge badge-danger"> {{ $participation->fields[$i] }} ({{ $participation->points[$i] }} / {{ $participation->maxpoints[$i] }}) </span>
										@endif
									@endfor
								</td>
								<td>
									@if($participation->reached_points < env('POINTS_TO_PASS'))
										<span class="badge badge-danger">{{ $participation->reached_points }} / {{$max_points}}</span>
									@else
										<span class="badge badge-success">{{ $participation->reached_points }} / {{$max_points}}</span>
									@endif
								</td>
								<td>
									@php($success = true)
									@if(count($participation->fields) > $fields_number)
										@if($participation->reached_points < env('POINTS_TO_PASS'))
											@php($success = false)
										@endif

										@for($i = 0; $i < count($participation->fields); $i++)
											@if((int) $participation->points[$i] < floor((int) $participation->maxpoints[$i] / 2))
												@php($success = false)
											@endif
										@endfor

										@if($success == true)
											<span class="badge badge-success">Bestanden</span>
										@else
											<span class="badge badge-danger">Nicht Bestanden</span>
										@endif
									@else
										<span class="badge badge-info">Unterwegs</span>
									@endif
								</td>
							</tr>
						@endforeach
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
                        Name
                    </th>
                    <th>
                        Abteilung
                    </th>
                    <th>
                        Posten bestanden
                    </th>
                    <th>
                        Punkte total
                    </th>
                    <th>
                        Status
                    </th>
                    </thead>
                    <tbody>
                    @foreach($second as $participation)
                        <tr>
                            <td>
                                @if($participation->scout_name)
                                    {{ $participation->scout_name }} / {{ $participation->first_name }} {{ $participation->last_name }}
                                @else
                                    {{ $participation->first_name }} {{ $participation->last_name }}
                                @endif
                            </td>
                            <td>
                                {{ $participation->group_name }}
                            </td>
                            <td>
                                @if($participation->fields[0] != "")
                                    @for($i = 0; $i < count($participation->fields); $i++)
                                        @if((int) $participation->points[$i] > floor((int) $participation->maxpoints[$i] / 2))
                                            <span class="badge badge-success"> {{ $participation->fields[$i] }} ({{ $participation->points[$i] }} / {{ $participation->maxpoints[$i] }}) </span>
                                        @elseif((int) $participation->points[$i] < floor((int) $participation->maxpoints[$i] / 2))
                                            <span class="badge badge-danger"> {{ $participation->fields[$i] }} ({{ $participation->points[$i] }} / {{ $participation->maxpoints[$i] }}) </span>
                                        @endif
                                    @endfor
                                @endif
                            </td>
                            <td>
                                @if($participation->reached_points != null)
                                    @if($participation->reached_points < env('POINTS_TO_PASS'))
                                        <span class="badge badge-danger">{{ $participation->reached_points }} / {{$max_points}}</span>
                                    @else
                                        <span class="badge badge-success">{{ $participation->reached_points }} / {{$max_points}}</span>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if($participation->fields[0] != "")
                                    @php($success = true)
                                    @if(count($participation->fields) > $fields_number)
                                        @if($participation->reached_points < env('POINTS_TO_PASS'))
                                            @php($success = false)
                                        @endif

											@for($i = 0; $i < count($participation->fields); $i++)
												@if((int) $participation->points[$i] < floor((int) $participation->maxpoints[$i] / 2))
													@php($success = false)
												@endif
											@endfor

											@if($success == true)
												<span class="badge badge-success">Bestanden</span>
											@else
												<span class="badge badge-danger">Nicht Bestanden</span>
											@endif
										@else
											<span class="badge badge-info">Unterwegs</span>
										@endif
									@endif
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
