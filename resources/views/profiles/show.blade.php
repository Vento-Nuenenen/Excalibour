@extends('layouts.app')

@section('template_title')
	{{ Auth::user()->scoutname ? Auth::user()->scoutname : Auth::user()->first_name }}'s Profile
@endsection

@section('template_fastload_css')
	#map-canvas{
		min-height: 300px;
		height: 100%;
		width: 100%;
	}
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">

						{{ trans('profile.showProfileTitle',['username' => Auth::user()->scoutname ? Auth::user()->scoutname : Auth::user()->first_name]) }}

					</div>
					<div class="panel-body">

    					<img src="@if ($user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->scoutname }}" class="user-avatar">

						<dl class="user-info">

							<dt>
								{{ trans('profile.showProfileUsername') }}
							</dt>
							<dd>
								{{ $user->scoutname }}
							</dd>

							<dt>
								{{ trans('profile.showProfileFirstName') }}
							</dt>
							<dd>
								{{ $user->first_name }}
							</dd>

							@if ($user->last_name)
								<dt>
									{{ trans('profile.showProfileLastName') }}
								</dt>
								<dd>
									{{ $user->last_name }}
								</dd>
							@endif

							<dt>
								{{ trans('profile.showProfileEmail') }}
							</dt>
							<dd>
								{{ $user->email }}
							</dd>
						</dl>

						@if ($user->profile)
							@if (Auth::user()->id == $user->id)
								{!! HTML::icon_link(URL::to('/profile/'.Auth::user()->id.'/edit'), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'btn btn-small btn-info btn-block')) !!}
							@endif
						@else
							<p>{{ trans('profile.noProfileYet') }}</p>
							{!! HTML::icon_link(URL::to('/profile/'.Auth::user()->id.'/edit'), 'fa fa-fw fa-plus ', trans('titles.createProfile'), array('class' => 'btn btn-small btn-info btn-block')) !!}
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('footer_scripts')

	@if(config('settings.googleMapsAPIStatus'))
		@include('scripts.google-maps-geocode-and-map')
	@endif

@endsection
