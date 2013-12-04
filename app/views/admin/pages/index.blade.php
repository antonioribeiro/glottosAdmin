@extends('admin.layout')

@section('pageHeader')
	<div class="row">
		<div class="col-lg-12">
		<h1>Languages <small>All languages available</small></h1>
			<ol class="breadcrumb">
				<li><a href="index.html"><i class="icon-dashboard"></i> Languages</a></li>
			</ol>
		</div>
	</div>
@stop

@section('content')

	<div class="row">
		<div class="col-lg-10 col-md-offset-1">
			<div class="table-responsive">
	            <p>
	              <div class="btn-group btn-group-justified">
	                <a href="{{ URL::route('admin.languages.index', ['all']) }}" class="btn btn-default {{$filtered == 'all' ?  'active' : ''}}">All</a>
	                <a href="{{ URL::route('admin.languages.index', ['enabled']) }}" class="btn btn-default {{$filtered == 'enabled' ?  'active' : ''}}">Enabled</a>
	                <a href="{{ URL::route('admin.languages.index', ['disabled']) }}" class="btn btn-default {{$filtered == 'disabled' ?  'active' : ''}}">Disabled</a>
	              </div>
	            </p>

				<table class="table table-bordered table-striped">
					@foreach($languages as $language)
						<tr>
							<td>{{ $language->regional_name }}
								<div  class="pull-right">
									<a href="{{ URL::route('admin.languages.'.($language->enabled ? 'disable' : 'enable'), $language->id) }}">
										<button type="button" class="btn btn-{{ $language->enabled ? 'danger' : 'success' }} btn-xs">
											@if($language->enabled)
												disable
											@else
												enable
											@endif
										</button>
									</a>
								</div>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>

@stop